<?php
namespace App\Models;

/**
 * 
 * @author Mark H.
 *
 */
class History
{
    private $history;
    private $historyUserId;

    public function __construct($history, $historyUserId){
        $this->history = $history;
        $this->historyUserId = $historyUserId;
    }
    /**
     * @return mixed
     */
    public function getHistoryUserId()
    {
        return $this->historyUserId;
    }

    /**
     * @param mixed $historyUserId
     */
    public function setHistoryUserId($historyUserId)
    {
        $this->historyUserId = $historyUserId;
    }

    /**
     * @return mixed
     */
    public function getHistory()
    {
        return $this->history;
    }

    /**
     * @param mixed $history
     */
    public function setHistory($history)
    {
        $this->history = $history;
    }

    
    
    
}