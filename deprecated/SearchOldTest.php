<?php

namespace PHPUnit\Framework;

class SearchTest extends TestCase
{

    public function testWithNoReservationsReturnAllCampsiteIds()
    {
        $reservations = [];
        $searchStartDate = date_create("2013-03-15");
        $searchEndDate = date_create("2013-03-21");
        $campsiteIds = [1,2,3,6,8];

//        $newSearch = new \Search($searchEndDate);

//        $this->assertInstanceOf(Search::class, $newSearch);

//        $this->assertEquals($campsiteIds, $newSearch->getAvailableCampsiteIds($searchStartDate, $searchEndDate, $reservations, $campsiteIds) );
    }

}

