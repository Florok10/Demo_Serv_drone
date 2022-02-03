<?php

namespace App\Models;

use App\Models\Order;

class OrderStatus
{
    private Order $order;

    private bool $Pending, $Validated, $Cancelled;

    public function __construct(Order $order)
    {
        $this->order = Order::findOrFail($order->id);
        
        switch($this->order->status)
        {
            case "Pending":
                $this->Pending = true;
                $this->Validated = false;
                $this->Cancelled = false;
                break;

            case "Validated":
                $this->Pending = false;
                $this->Validated = true;
                $this->Cancelled = false;
                break;

            case "Cancelled":
                $this->Pending = false;
                $this->Validated = false;
                $this->Cancelled = true;
                break;
        }

    }

    public function setStatus(string $status)
    {
        $this->order->status = $status;
    }

    public function getStatus()
    {
        return $this->order->status;
    }

    public function getStatusMessage()
    {
        switch($this->order->status)
        {
            case "Pending":
                return "La commande est en attente";

            case "Validated":
                return "La commande est validée";

            case "Cancelled":
                return "La commande est annulée";
        }
    }
}
