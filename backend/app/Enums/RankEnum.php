<?php

namespace app\Enums;

enum RankEnum: string
{
    case COMMANDER = 'Commander';
    // case EDUCATOR_MISSION_SPECIALIST = 'Educator mission specialist';
    case FLIGHT_ENGINEER = 'Flight engineer';
    case MISSION_SPECIALIST = 'Mission specialist';
    // case PAYLOAD_COMMANDER = 'Payload commander';
    // case PAYLOAD_SPECIALIST = 'Payload specialist';
    case PILOT = 'Pilot';
    // case SPACEFLIGHT_PARTICIPANT = 'Spaceflight participant';
}
