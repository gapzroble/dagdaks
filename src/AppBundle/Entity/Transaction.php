<?php

namespace AppBundle\Entity;

/**
 * @author Randolph Roble <roblerm@gmail.com>
 */
class Transaction
{

    private $jvNumber;
    private $sdNumber;
    private $cvNumber;
    private $date;
    private $particulars;
    private $amount;

    public function getJvNumber()
    {
        return $this->jvNumber;
    }

    public function getSdNumber()
    {
        return $this->sdNumber;
    }

    public function getCvNumber()
    {
        return $this->cvNumber;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getParticulars()
    {
        return $this->particulars;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function setJvNumber($jvNumber)
    {
        $this->jvNumber = $jvNumber;
        return $this;
    }

    public function setSdNumber($sdNumber)
    {
        $this->sdNumber = $sdNumber;
        return $this;
    }

    public function setCvNumber($cvNumber)
    {
        $this->cvNumber = $cvNumber;
        return $this;
    }

    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    public function setParticulars($particulars)
    {
        $this->particulars = $particulars;
        return $this;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

}
