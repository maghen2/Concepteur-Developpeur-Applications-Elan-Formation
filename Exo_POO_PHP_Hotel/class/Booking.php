<?php
class Booking{
    private Room $room;
    private Customer $customer;
    private DateTime  $dateBooking;
    private DateTime $dateEntry;
    private DateTime  $dateLeaving;

    //constructeur
    public function __construct(Room $room, Customer $customer, DateTime $dateBooking, DateTime $dateEntry, DateTime $dateLeaving){
        $this->room = $room;
        $this->room->addBoking($this);
        $this->customer = $customer;
        $this->customer->addBooking($this);
        $this->dateBooking = $dateBooking;
        $this->dateEntry = $dateEntry;
        $this->dateLeaving = $dateLeaving;
        $this->room->getHotel()->addBooking($this);
        
    }

    //toString
    public function __toString(): string{
        return $this->room." (".$this->dateEntry." - ".$this->dateLeaving.")";
    }

    //getInfo
    public function getInfo(): string{
        return "Room: ".$this->room." Customer: ".$this->customer." DateBooking: ".$this->dateBooking." DateEntry: ".$this->dateEntry." DateLeaving: ".$this->dateLeaving;
    }

    //getters and setters
    

    /**
     * Get the value of room
     */ 
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * Set the value of room
     *
     * @return  self
     */ 
    public function setRoom($room)
    {
        $this->room = $room;

        return $this;
    }

    /**
     * Get the value of customer
     */ 
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set the value of customer
     *
     * @return  self
     */ 
    public function setCustomer($customer)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get the value of dateBooking
     */ 
    public function getDateBooking()
    {
        return $this->dateBooking;
    }

    /**
     * Set the value of dateBooking
     *
     * @return  self
     */ 
    public function setDateBooking($dateBooking)
    {
        $this->dateBooking = $dateBooking;

        return $this;
    }

    /**
     * Get the value of dateEntry
     */ 
    public function getDateEntry()
    {
        return $this->dateEntry;
    }

    /**
     * Set the value of dateEntry
     *
     * @return  self
     */ 
    public function setDateEntry($dateEntry)
    {
        $this->dateEntry = $dateEntry;

        return $this;
    }

    /**
     * Get the value of dateLeaving
     */ 
    public function getDateLeaving()
    {
        return $this->dateLeaving;
    }

    /**
     * Set the value of dateLeaving
     *
     * @return  self
     */ 
    public function setDateLeaving($dateLeaving)
    {
        $this->dateLeaving = $dateLeaving;

        return $this;
    }
}
  