<?php

namespace AncaRebeca\FullCalendarBundle\Event;

use AncaRebeca\FullCalendarBundle\Model\EventInterface;
use Symfony\Component\EventDispatcher\Event;

class CalendarEvent extends Event
{
    const SET_DATA = 'fullcalendar.set_data';

    /**
     * @var \Datetime
     */
    protected $start;

    /**
     * @var \Datetime
     */
    protected $end;

    /**
     * @var array
     */
    protected $filters;

    /**
     * @var EventInterface[]
     */
    protected $events = [];

    /**
     * @param \Datetime $star
     * @param \Datetime $end
     * @param array $filters
     */
    public function __construct(\Datetime $star, \Datetime $end, array $filters)
    {
        $this->start = $star;
        $this->end = $end;
        $this->filters = $filters;
    }

    /**
     * @return \Datetime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
   * @return CalendarEvent
   */
  public function setStart(\DateTime $start)
  {
      $this->start = $start;
      return $this;
  }


    /**
     * @return \Datetime
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @return array
     */
    public function getFilters()
    {
        return $this->filters;
    }

    /**
     * @param EventInterface $event
     *
     * @return $this
     */
    public function addEvent(EventInterface $event)
    {
        if (!in_array($event, $this->events, true)) {
            $this->events[] = $event;
        }

        return $this;
    }

    /**
     * @return EventInterface[]
     */
    public function getEvents()
    {
        return $this->events;
    }
}
