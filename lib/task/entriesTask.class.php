<?php

class entriesTask extends sfBaseTask {

    protected function configure() {
        // // add your own arguments here
        // $this->addArguments(array(
        //   new sfCommandArgument('my_arg', sfCommandArgument::REQUIRED, 'My argument'),
        // ));

        $this->addOptions(array(
            new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name'),
            new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
            new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'doctrine'),
                // add your own options here
        ));

        $this->namespace = 'youtube';
        $this->name = 'entries';
        $this->briefDescription = '';
        $this->detailedDescription = <<<EOF
The [entries|INFO] task does things.
Call it with:

  [php symfony entries|INFO]
EOF;
    }

    protected function execute($arguments = array(), $options = array()) {
        // initialize the database connection
        $databaseManager = new sfDatabaseManager($this->configuration);
        $connection = $databaseManager->getDatabase($options['connection'])->getConnection();

        // add your code here
       // $this->youtubeEntry();
        $this->twitterEntry();
    }
    
    function twitterEntry(){
        include "lib/vendor/Zend/Loader.php";
        $username = "uoatest7";
        Zend_Loader::loadClass("Zend_Http_Client");
        //Zend_Loader::loadClass("Zend_Validate_Hostname");

        $client = new Zend_Http_Client('http://twitter.com/statuses/user_timeline/' . $username . '.xml', array(
                                                                        'maxredirects' => 0,
                                                                        'timeout'      => 30)
                                               );
        $response = $client->request();
        $tweets = $response->getBody();
        $tweetsXmml = simplexml_load_string($tweets);
        foreach($tweetsXmml->status as $tweet)
        {
//           print_r($tweet);//// do whatever you want with this $tweet
//           echo $tweet->text;
            $entries = new Entries();
            $entries->setSource('TWITTER');
//            $entries->setName($videoEntry->getVideoTitle());
            $entries->setStory($tweet->text);
            $entries->save();
            
        }
    }



    function youtubeEntry(){
        ini_set("display_errors", 0);
        /**
         * credentials
         */
        define('EMAIL_ID', 'uoatest7@gmail.com');
        define('EMAIL_PASS', 'uoatest@7');
        define('YOUTUBE_DEVELOPER_KEY', 'AI39si4DVYjRr1KL17gdDJwosRs4eUblWKBKB7rbqV90Ku1jDye7rVjXbZ_2KaZGiqcDeJBhDYgIzFjczF2FQBUslV27bMeJ9Q');

        require_once 'lib/vendor/Zend/Loader.php';
        Zend_Loader::loadClass('Zend_Gdata_YouTube');
        Zend_Loader::loadClass('Zend_Gdata_ClientLogin');


        $httpClient = Zend_Gdata_ClientLogin::getHttpClient(EMAIL_ID, EMAIL_PASS, 'youtube', null, 'UoAyoutube', null, null, 'https://www.google.com/accounts/ClientLogin');
        $applicationId = 'Video uploader v1';
        $clientId = 'My video upload client - v1';

        $yt = new Zend_Gdata_YouTube($httpClient, $applicationId, $clientId, YOUTUBE_DEVELOPER_KEY);
        $yt->setMajorProtocolVersion(2);

//$videoFeed = $yt->getVideoFeed(Zend_Gdata_YouTube::VIDEO_URI);
        $videoFeed = $yt->getuserUploads("uoatest7");
        $this->printVideo($videoFeed);
    }
        
    
    function printVideo($videoFeed) {
            $count = 1;
            foreach ($videoFeed as $videoEntry) {
                $this->printVideoEntry($videoEntry);
                $count++;
            }
        }

       
    function printVideoEntry($videoEntry) {
            // the videoEntry object contains many helper functions
            // that access the underlying mediaGroup object
//            echo 'Video: ' . $videoEntry->getVideoTitle() . "<br />";
            //echo 'Video ID: ' . $videoEntry->getVideoId() . "<br />";
            //echo 'Updated: ' . $videoEntry->getUpdated() . "<br />";
//            echo 'Description: ' . $videoEntry->getVideoDescription() . "<br />";
            //echo 'Category: ' . $videoEntry->getVideoCategory() . "<br />";
            //echo 'Tags: ' . implode(", ", $videoEntry->getVideoTags()) . "<br />";
//            echo 'Watch page: ' . $videoEntry->getVideoWatchPageUrl() . "<br />";
//            echo 'Flash Player Url: ' . $videoEntry->getFlashPlayerUrl() . "<br />";
//            echo 'Duration: ' . $videoEntry->getVideoDuration() . "<br />";
            //echo 'View count: ' . $videoEntry->getVideoViewCount() . "<br />";
            //echo 'Rating: ' . $videoEntry->getVideoRatingInfo() . "<br />";
            //echo 'Geo Location: ' . $videoEntry->getVideoGeoLocation() . "<br />";
            //echo 'Recorded on: ' . $videoEntry->getVideoRecorded() . "<br />";                   
            
            $entries = new Entries();
            $entries->setSource('YOUTUBE');
            $entries->setName($videoEntry->getVideoTitle());
            $entries->setStory($videoEntry->getFlashPlayerUrl());
            $entries->save();
        }

    

}
