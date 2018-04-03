<?php

class Model
{
    /**
     * @param object $db A PDO database connection
     */
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    function console_log($data)
    {
        echo '<script>';
        echo 'console.log(' . json_encode($data) . ')';
        echo '</script>';
    }

    /**
     * Get all songs from database
     */
    public function getAllSongs()
    {
        $sql = "SELECT id, artist, track, link FROM song";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }

    /**
     * Add a song to database
     * TODO put this explanation into readme and remove it from here
     * Please note that it's not necessary to "clean" our input in any way. With PDO all input is escaped properly
     * automatically. We also don't use strip_tags() etc. here so we keep the input 100% original (so it's possible
     * to save HTML and JS to the database, which is a valid use case). Data will only be cleaned when putting it out
     * in the views (see the views for more info).
     * @param string $artist Artist
     * @param string $track Track
     * @param string $link Link
     */
    public function addUser($username, $email, $password)
    {
        $passwordEncrypt = md5($password);

        $sql = "INSERT INTO Member (username, memberEmail, password, firstLogin) VALUES (:username, :email , :password, :datetime)";
        $query = $this->db->prepare($sql);
        $parameters = array(':username' => $username, ':email' => $email, ':password' => $passwordEncrypt, ':datetime' => date("Y-m-d H:i:s"));

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Delete a song in the database
     * Please note: this is just an example! In a real application you would not simply let everybody
     * add/update/delete stuff!
     * @param int $song_id Id of song
     */
    public function deleteSong($song_id)
    {
        $sql = "DELETE FROM song WHERE id = :song_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':song_id' => $song_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Get a song from database
     */
    public function getSong($song_id)
    {
        $sql = "SELECT id, artist, track, link FROM song WHERE id = :song_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':song_id' => $song_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

        // fetch() is the PDO method that get exactly one result
        return $query->fetch();
    }

    /**
     * Update a song in database
     * // TODO put this explaination into readme and remove it from here
     * Please note that it's not necessary to "clean" our input in any way. With PDO all input is escaped properly
     * automatically. We also don't use strip_tags() etc. here so we keep the input 100% original (so it's possible
     * to save HTML and JS to the database, which is a valid use case). Data will only be cleaned when putting it out
     * in the views (see the views for more info).
     * @param string $artist Artist
     * @param string $track Track
     * @param string $link Link
     * @param int $song_id Id
     */
    public function updateSong($artist, $track, $link, $song_id)
    {
        $sql = "UPDATE song SET artist = :artist, track = :track, link = :link WHERE id = :song_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':artist' => $artist, ':track' => $track, ':link' => $link, ':song_id' => $song_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Get simple "stats". This is just a simple demo to show
     * how to use more than one model in a controller (see application/controller/songs.php for more)
     */
    public function getAmountOfSongs()
    {
        $sql = "SELECT COUNT(id) AS amount_of_songs FROM song";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetch() is the PDO method that get exactly one result
        return $query->fetch()->amount_of_songs;
    }

    /**
     * Get all upcoming matches data.
     */
    public function timeline()
    {
        $timelineVar = $this->timelineFilter();

        $url = 'https://api.pandascore.co' . $timelineVar . '?page[number]=1&token=n-ijk1gBxy_DM-hg574l6Eaft6-QobYBdLVsobvIoA9vCFxm8yk';

        $json = file_get_contents($url);
        $timeline_array = json_decode($json, true);

        return $timeline_array;
    }

    /**
     * Get all upcoming/running/past matches data.
     */
    public function timelineFilter()
    {
        $timelineVar = null;
        $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

        if (strpos($url, 'running') !== false) {
            $timelineVar = '/matches/running';
        } elseif (strpos($url, 'past') !== false) {
            $timelineVar = '/matches/past';
        } else {
            $timelineVar = '/matches/upcoming';
        }

        return $timelineVar;
    }

    /**
     * Get all streamers data.
     */
    public function getStreamers($counter)
    {
        $result = array();

        for ($i = 0; $i <= $counter; $i++) {
            ${"urlPage$i"} = 'https://mixer.com/api/v1/channels?limit=100&page=' . $i;
            ${"jsonPage$i"} = file_get_contents(${"urlPage$i"});
            ${"arrayPage$i"} = json_decode(${"jsonPage$i"}, true);

            $result = array_merge($result, ${"arrayPage$i"});
        }

        return $result;
    }

    public function getStreamersID()
    {
        // gets all the items from the database Streamer table
        $sql = "SELECT streamID FROM Streamer";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function streamerUpdate($website, $streamersWeb)
    {

        // checks the getStreamersID() function
        $streamersDb = $this->getStreamersID();

        // if not empty, try to update. if empty, just insert all of it
        if (!empty($streamersDb)) {

            // variables for counting the json and database items
            $counterStreamersDb = 0;
            $counterStreamersWeb = 0;

            // counts the database items
            foreach ($streamersDb as $streamersDB) {
                $counterStreamersDb++;
            }

            // two foreach loops, one for getting all the json items and another to get all the database items
            foreach ($streamersWeb as $key => $streamerWeb) {
                foreach ($streamersDb as $streamersDB) {

                    // json item equals database item, update the current information about the streamer
                    if (((int)$streamersDB->streamID) == $streamerWeb['id']) {
                        $sql = "UPDATE Streamer SET streamName = :streamName, lastOnline = :lastOnline, categorie = :categorie, website = :website WHERE streamID = :streamID";
                        $query = $this->db->prepare($sql);
                        $parameters = array(':streamName' => $streamerWeb['token'], ':lastOnline' => date("Y-m-d H:i:s"), ':categorie' => $streamerWeb['type']['name'], ':streamID' => $streamerWeb['id'], ':website' => $website);

                        $query->execute($parameters);

                        // be done with this item and start with the next
                        continue;
                    }

                    $counterStreamersWeb++;

                    //if the amount of items checked with the database is the same amount of items checked with json, then dont update but insert as a new item
                    if ($counterStreamersWeb == $counterStreamersDb) {
                        $sql = "INSERT INTO Streamer (streamID, streamName, lastOnline, categorie, website) VALUES (:streamID, :streamName , :lastOnline, :categorie, :website)";
                        $query = $this->db->prepare($sql);
                        $parameters = array(':streamID' => $streamerWeb['id'], ':streamName' => $streamerWeb['token'], ':lastOnline' => date("Y-m-d H:i:s"), ':categorie' => $streamerWeb['type']['name'], ':website' => $website);

                        $query->execute($parameters);

                        // reset counter
                        $counterStreamersWeb = 0;
                    }
                }
                // reset counter
                $counterStreamersWeb = 0;

            }
        }else{ // do this when database is empty
            foreach ($streamersWeb as $key => $streamerWeb) {
                $sql = "INSERT INTO Streamer (streamID, streamName, lastOnline, categorie, website) VALUES (:streamID, :streamName , :lastOnline, :categorie, :website)";
                $query = $this->db->prepare($sql);
                $parameters = array(':streamID' => $streamerWeb['id'], ':streamName' => $streamerWeb['token'], ':lastOnline' => date("Y-m-d H:i:s"), ':categorie' => $streamerWeb['type']['name'], ':website' => $website);

                $query->execute($parameters);
            }
        }
    }
}
