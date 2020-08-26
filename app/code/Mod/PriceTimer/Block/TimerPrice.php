<?php

namespace Mod\PriceTimer\Block;

use Magento\Catalog\Api\ProductRepositoryInterface;

class TimerPrice extends \Mod\PriceView\Block\PriceView
{

    public function firstOfferEnd()
    {

        if (!$this->ruleOfferTime() || !$this->specialOfferTime()) {
            return null;
        }

        $minRuleOfferTime = false;
        if (gettype(json_decode($this->ruleOfferTime())) === 'array' && count(json_decode($this->ruleOfferTime())) > 1) {

            foreach (json_decode($this->ruleOfferTime()) as $item) {
                $minRuleOfferTime = $minRuleOfferTime < (new \DateTime(date($item)))->getTimestamp() ?:
                    (new \DateTime(date($item)))->getTimestamp();
            }
        }

        $ruleOfferEnd = $minRuleOfferTime ?
                        $minRuleOfferTime : (new \DateTime(date(json_decode($this->ruleOfferTime()))))->getTimestamp();
        $specialOfferEnd = (new \DateTime(date($this->specialOfferTime())))->getTimestamp();

        return $ruleOfferEnd > $specialOfferEnd ? 'special offer' : 'rule offer';
    }

    public function ruleOfferTime()
    {
        $rulesArr = $this->_priceHelper->getRulesFromProduct($this->getProduct()->getId());

        if (count($rulesArr) > 1) {
            return $this->rulesOfferTime($rulesArr);
        }
        if (!$rulesArr) {
            return false;
        }
        return json_encode((new \DateTime())->setTimestamp($rulesArr[0]['to_time'])->format('Y/m/d'));
    }
    public function rulesOfferTime($rulesArr)
    {
        $result = [];
        foreach ($rulesArr as $rules) {
            $result[] = (new \DateTime())->setTimestamp($rules['to_time'])->format('Y/m/d');
        }
        return json_encode($result);
    }
    public function specialOfferTime()
    {
        if (!$this->getProduct()->getSpecialToDate()) {
            return null;
        }
        return (new \DateTime(date($this->getProduct()->getSpecialToDate())))->format('Y/m/d');
    }

}
