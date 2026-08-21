<?php
// include 'db_config';
require 'token_generator.php';

class token {

    public function getTokenNow($conn) {

        $sql = "SELECT * FROM tokens WHERE no_request < 100";
        $result = mysqli_query($conn, $sql);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                if ($row['date_ended'] == null) {
                    $live_username = $row['live_username'];
                    $live_password = $row['live_password'];
                    $tokenGenerator = new TokenGenerator('Ke7z5_DWGTCM_COM_AUT', 'x8TKi7g2B3QeGw96W');
                    // $tokenGenerator = new TokenGenerator($live_username, $live_password);
                    $token = $tokenGenerator->loadToken();
                    
                    // Verify $token and $token->Token exist before accessing
                    if ($token && isset($token->Token)) {
                        return array($row['tokenID'], $token->Token);
                    }
                } else {
                    $date1 = date_create($row['date_ended']);
                    $date2 = date_create(date('Y-m-d'));
                    $diff = date_diff($date1, $date2);
                    $diff = (int)$diff->format("%R%a"); // Cast directly to integer instead of string formatting
                    
                    if ($diff > 31) {
                        $tokenID = (int)$row['tokenID'];
                        $sql = "UPDATE tokens SET date_ended = null WHERE tokenID = $tokenID";
                        mysqli_query($conn, $sql);

                        $live_username = $row['live_username'];
                        $live_password = $row['live_password'];
                        $tokenGenerator = new TokenGenerator('Ke7z5_DWGTCM_COM_AUT', 'x8TKi7g2B3QeGw96W');
                        // $tokenGenerator = new TokenGenerator($live_username, $live_password);
                        $token = $tokenGenerator->loadToken();

                        // Verify $token and $token->Token exist before accessing
                        if ($token && isset($token->Token)) {
                            return array($row['tokenID'], $token->Token);
                        }
                    }
                }
            }
        }
        
        // Return an empty array instead of null so count() in 3.php won't crash
        return [];
    }
}