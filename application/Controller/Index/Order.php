<?php
/**
 * vpcvcms
 * 案例页面
 */
class Controller_Index_Order extends Core_Controller_TAction
{
	public function preDispatch() 
	{
        parent::preDispatch();
	}

    public function cartAction()
    {
        $user = $this->getUser();
        $carts = C::M('cart')->getCarts($user['uid']);
        $total = 0;
        foreach($carts AS $cart)
        {
            $total += $cart['amount'];
        }
        $this->assign('total', $total);
        $this->assign('carts', $carts);
        $this->assign('num', count($carts));
        $this->display('order/cart.tpl');
    }

    public function checkoutAction()
    {
        $user = $this->getUser();
        $carts = C::M('cart')->getCarts($user['uid']);
        $this->assign('carts', $carts);
        $this->assign('num', C::M('cart')->getCartNum($user['uid']));
        $this->assign('amount', C::M('cart')->getAmount($user['uid']));
        $this->display('order/checkout.tpl');
    }

    public function addcartAction()
    {
        $user = $this->getUser();
        $goodsid = $this->getParam('goodsid');
        $type = $this->getParam('type');
        $num = $this->getParam('goodsnum');
        $color = $this->getParam('color');
        $size = $this->getParam('size');
        $attr = $this->getParam('attr');
        $data = array(
            'uid' => $user['uid'],
            'goodsid' => $goodsid,
            'goodsname' => C::M('goods')->getOneById('goodsname', $goodsid),
            'type' => $type,
            'price' => C::M('goods')->getOneById('price', $goodsid),
            'num' => $num,
            'attr' => $attr,
            'color' => $color,
            'size' => $size
        );
        $cart = C::M('cart')->updateCart($data);
        if($cart)
        {
            $arr['msg'] = 1;
        }
        else
        {
            $arr['msg'] = 0;
        }
        echo Core_Fun::array2json($arr);
    }

    public function changenumAction()
    {
        if(!Core_Fun::isAjax())
        {
            $arr['msg'] = 0;
        }
        else
        {
            $user = $this->getUser();
            $goodsid = $this->getParam('goodsid');
            $num = $this->getParam('num');
            $update = array(
                'uid' => $user['uid'],
                'goodsid' => $goodsid,
                'num' => $num
            );
            $cart = C::M('cart')->updateCart($update);
            if($cart)
            {
                $cart = C::M('cart')->getCart($user['uid'], $goodsid);
                $arr['msg'] = 1;
                $arr['amount'] = $cart['amount'];
            }
            else
            {
                $arr['msg'] = 0;
            }
        }
        echo Core_Fun::array2json($arr);
    }

    public function trashAction()
    {
        if(!Core_Fun::isAjax())
        {
            $arr['msg'] = 0;
        }
        else
        {
            $id = $this->getParam('id');
            $cart = C::M('cart')->remove($id);
            if($cart)
            {
                $arr['msg'] = 1;
            }
            else
            {
                $arr['msg'] = 0;
            }
        }
        echo Core_Fun::array2json($arr);
    }

    public function payAction()
    {
        $user = $this->getUser();
        $time = Core_Fun::time();
        $carts = C::M('cart')->getCarts($user['uid']);
        $ordersn = Core_Fun::getOrdersn();
        if($carts)
        {
            $ordercarts = C::M('cart')->getAmount($user['uid']);
            $data = array(
                'uid' => $user['uid'],
                'goodsid' => $ordercarts['goodsid'],
                'goodsname' => $ordercarts['goodsname'],
                'type' => $ordercarts['type'],
                'num' => $ordercarts['num'],
                'ordersn' => $ordersn,
                'amount' => $ordercarts['amount'],
                'addtime' => $time,
                'status' => 1
            );
            $orderid = C::M('order')->add($data);
            foreach($carts AS $cart)
            {
                $amount = $cart['price'] * $cart['num'];
                if($orderid > 0)
                {
                    $goods = array(
                        'goodsid' => $cart['goodsid'],
                        'orderid' => $orderid,
                        'goodsname' => C::M('goods')->getOneById('goodsname', $cart['goodsid']),
                        'marketprice' => C::M('goods')->getOneById('marketprice', $cart['goodsid']),
                        'price' => $cart['price'],
                        'attr' => $cart['attr'],
                        'color' => $cart['color'],
                        'size' => $cart['size'],
                        'num' => $cart['num'],
                        'amount' => $amount,
                        'addtime' => $time
                    );
                    C::M('ordergoods')->add($goods);
                }
            }
            C::M('cart')->clearCart();
            $arr['msg'] = 1;
            $arr['orderid'] = $orderid;
            $arr['amount'] = $ordercarts['amount'];
        }
        else
        {
            $arr['msg'] = 0;
        }
        echo Core_Fun::array2json($arr);
    }
    
    public function paymentAction()
    {
        $user = $this->getUser();
        $orderid = $this->getParam('orderid');
        $amount = $this->getParam('amount');
        $order = C::M('order')->find($orderid);
        if(!$order)
            $this->showmsg('该订单不存在', 'order/my');
        if($amount != $order['amount'])
            $this->showmsg('你的订单存在安全风险，请重新支付', 'order/payment/orderid/' . $order['id'] . '/amount/' . $order['amount']);
        if($order['addtime'] + (3600 * 24) < Core_Fun::time())
        {
            C::M('order')->update(array(
                'id' => $order['id'],
                'status' => -1
            ));
            $this->showmsg('该订单已过期，请重新下单');
        }
        $this->assign('amount', $amount);
        $this->assign('order', $order);
        $this->assign('count', C::M('ordergoods')->getCount(array(array('orderid', $order['id']))));
        $this->display('order/pay.tpl');
    }
}