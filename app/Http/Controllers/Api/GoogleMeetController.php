<?php

namespace App\Http\Controllers\Api;

require_once __DIR__.'/../../../../vendor/autoload.php';

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Google\Service\Calendar;
use Google\Service\Calendar\Event;
use Google\Client;
use Exception;

class GoogleMeetController extends Controller
{
    public function __invoke()
    {
        $client = $this->getClient();
        $calendarService = new Calendar($client);
        $calendarId = 'primary';
        $optParams = array(
            'maxResults' => 10,
            'orderBy' => 'startTime',
            'singleEvents' => true,
            'timeMin' => date('c'),
        );
        $results = $calendarService->events->listEvents($calendarId, $optParams);
        $events = $results->getItems();
        $action = 'listEvents';
        switch ($action) {
            case 'addEvent':
                $event = new Event(array(
                    'summary' => 'Prueba de creacion de evento en Google Calendar',
                    'location' => 'En la casa de Bart',
                    'description' => 'Esta es una reunion para divertirnos',
                    'start' => array(
                        'dateTime' => '2022-09-08T09:00:00-07:00',
                        'timeZone' => 'America/Bogota',
                    ),
                    'end' => array(
                        'dateTime' => '2021-09-08T17:00:00-08:00',
                        'timeZone' => 'America/Bogota',
                    ),
                    "conferenceData" => [
                        "createRequest" => [
                            "conferenceId" => [
                                "type" => "eventNamedHangout"
                            ],
                            "requestId" => "123"
                        ]
                    ],
                    'recurrence' => array(
                        'RRULE:FREQ=DAILY;COUNT=2'
                    ),
                    'attendees' => array(
                        array('email' => 'lpage@example.com'),
                        array('email' => 'sbrin@example.com'),
                    ),
                    'reminders' => array(
                        'useDefault' => FALSE,
                        'overrides' => array(
                            array('method' => 'email', 'minutes' => 24 * 60),
                            array('method' => 'popup', 'minutes' => 10),
                        ),
                    ),
                ));
                $calendarId = 'primary';
                $event = $calendarService->events->insert(
                    $calendarId,
                    $event,
                    ['conferenceDataVersion' => 1]
                );
                printf('Event created: %s\n', $event->getHangoutLink());
                break;
            case 'listEvents':
                print "Upcoming events:\n";
                foreach ($events as $event) {
                    $start = $event->start->dateTime;
                    if (empty($start)) {
                        $start = $event->start->date;
                    }
                    printf("%s (%s)\n", $event->getSummary(), $start);
                }
                break;
            default:
                printf('Its not possible to get the events');
                break;
        }
    }

    public function getClient()
    {
        $client = new Client();
        $client->setApplicationName('Google  Calendar API PHP Quickstart');
        $client->setScopes(Calendar::CALENDAR);
        $client->setAuthConfig(__DIR__.'/../../../../google-credentials.json');
        $client->setAccessType('offline');
        $client->setPrompt('select_account consent');
        $tokenPath = __DIR__.'/../../../../token.json';
        if (file_exists($tokenPath)) {
            $accessToken = json_decode(file_get_contents($tokenPath), true);
            $client->setAccessToken($accessToken);
        }

        if ($client->isAccessTokenExpired()) {
            if ($client->getRefreshToken())
            {
                $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
            }
            else
            {
                $authUrl = $client->createAuthUrl();
                //echo "<script> alert('{$authUrl})';</script>";
                //printf("Open the following link in your browser:\n%s\n", $authUrl);
                //print 'Enter verification code: ';
                //$authCode = trim(fgets(STDIN));
                $authCode = '4/0AdQt8qha9YWRmw6atLs6a9IupU2zczPmn8Z5Bk8-u_nuimYHB43b6_ZUj3pWUAb__ev-nQ';
                $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
                $client->setAccessToken($accessToken);
                if (array_key_exists('error', $accessToken))
                {
                    throw new Exception(join(', ', $accessToken));
                }
            }
            // Save the token to a file.
            if (!file_exists(dirname($tokenPath)))
            {
                mkdir(dirname($tokenPath), 0700, true);
            }
            file_put_contents($tokenPath, json_encode($client->getAccessToken()));
        }
        return $client;
    }
}
