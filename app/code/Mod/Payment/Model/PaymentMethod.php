<?php


namespace Mod\Payment\Model;

use Magento\Payment\Model\Method\AbstractMethod;

class PaymentMethod extends AbstractMethod
{
    protected $_code = 'custompayment';
}
