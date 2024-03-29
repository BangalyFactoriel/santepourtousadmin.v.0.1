<?php
    namespace app\components;
    use Yii;
    use yii\base\Component;
    use yii\base\InvalidConfigException;

    /**
    *
    */
    define("PBKDF2_HASH_ALGORITHM", "sha256");
    define("PBKDF2_ITERATIONS", 1000);
    define("PBKDF2_SALT_BYTE_SIZE", 24);
    define("PBKDF2_HASH_BYTE_SIZE", 24);

    define("HASH_SECTIONS", 4);
    define("HASH_ALGORITHM_INDEX", 0);
    define("HASH_ITERATION_INDEX", 1);
    define("HASH_SALT_INDEX", 2);
    define("HASH_PBKDF2_INDEX", 3);

  //  define("CODESIZE", Yii::app()->params['codeSize']);

    class cryptoClass extends Component{

        public function create_hash($password){
            //format: algorithm:iterations:salt:hash
            /* cette function : mcrypt_create_iv nest plus prise en charge
            //$salt = base64_encode(mcrypt_create_iv(PBKDF2_SALT_BYTE_SIZE, MCRYPT_DEV_URANDOM)); 
            */
            $salt = base64_encode(random_bytes(PBKDF2_SALT_BYTE_SIZE));
            return PBKDF2_HASH_ALGORITHM . ":" . PBKDF2_ITERATIONS . ":" .  $salt . ":" .
                base64_encode( $this->pbkdf2(
                    PBKDF2_HASH_ALGORITHM,
                    $password,
                    $salt,
                    PBKDF2_ITERATIONS,
                    PBKDF2_HASH_BYTE_SIZE,
                    true
                ));
        }

        public function validate_password($password, $correct_hash){
            
            $params = explode(":", $correct_hash);
            if(count($params) < HASH_SECTIONS) return false;
            $pbkdf2 = base64_decode($params[HASH_PBKDF2_INDEX]);
            return $this->slow_equals(
                $pbkdf2,
                $this->pbkdf2(
                            $params[HASH_ALGORITHM_INDEX],
                            $password,
                            $params[HASH_SALT_INDEX],
                            (int)$params[HASH_ITERATION_INDEX],
                            strlen($pbkdf2),
                            true
                )
            );
        }

        //sha256:1000:7HT9bC3xSuHxcO5ORWkB1BXglMf5chAt:xlLvo4FOJgrlL+3t2vVl95AyKWekIkcl

        //Compares two strings $a and $b in length-constant time.
        public function slow_equals($a, $b){
            $diff = strlen($a) ^ strlen($b);
            for($i = 0; $i < strlen($a) && $i < strlen($b); $i++)
            {
                $diff |= ord($a[$i]) ^ ord($b[$i]);
            }
            return $diff === 0;
        }
        /*
         * PBKDF2 key derivation function as defined by RSA's PKCS #5: https://www.ietf.org/rfc/rfc2898.txt
         * $algorithm - The hash algorithm to use. Recommended: SHA256
         * $password - The password.
         * $salt - A salt that is unique to the password.
         * $count - Iteration count. Higher is better, but slower. Recommended: At least 1000.
         * $key_length - The length of the derived key in bytes.
         * $raw_output - If true, the key is returned in raw binary format. Hex encoded otherwise.
         * Returns: A $key_length-byte key derived from the password and salt.
         *
         * Test vectors can be found here: https://www.ietf.org/rfc/rfc6070.txt
         *
         * This implementation of PBKDF2 was originally created by https://defuse.ca
         * With improvements by http://www.variations-of-shadow.com
         */
        public function pbkdf2($algorithm, $password, $salt, $count, $key_length, $raw_output = false){
            $algorithm = strtolower($algorithm);
            if(!in_array($algorithm, hash_algos(), true))
                trigger_error('PBKDF2 ERROR: Invalid hash algorithm.', E_USER_ERROR);
            if($count <= 0 || $key_length <= 0)
                trigger_error('PBKDF2 ERROR: Invalid parameters.', E_USER_ERROR);

            if (function_exists("hash_pbkdf2")) {
                // The output length is in NIBBLES (4-bits) if $raw_output is false!
                if (!$raw_output) {
                    $key_length = $key_length * 2;
                }
                return hash_pbkdf2($algorithm, $password, $salt, $count, $key_length, $raw_output);
            }

            $hash_length = strlen(hash($algorithm, "", true));
            $block_count = ceil($key_length / $hash_length);

            $output = "";
            for($i = 1; $i <= $block_count; $i++) {
                // $i encoded as 4 bytes, big endian.
                $last = $salt . pack("N", $i);
                // first iteration
                $last = $xorsum = hash_hmac($algorithm, $last, $password, true);
                // perform the other $count - 1 iterations
                for ($j = 1; $j < $count; $j++) {
                    $xorsum ^= ($last = hash_hmac($algorithm, $last, $password, true));
                }
                $output .= $xorsum;
            }

            if($raw_output)
                return substr($output, 0, $key_length);
            else
                return bin2hex(substr($output, 0, $key_length));
        }


        #************************************************************************
        # THIS FUNCTION CREATE A PASSWORD BASE ON THE STRING GIVING AS PARAMETERS
        #************************************************************************
        public function create_password($strg){

          $salt = base64_encode(random_bytes(PBKDF2_SALT_BYTE_SIZE));
          
          $password = PBKDF2_HASH_ALGORITHM . ":" . PBKDF2_ITERATIONS . ":" . $salt . ":" .
                        base64_encode(
                        $this->pbkdf2(
                          PBKDF2_HASH_ALGORITHM,
                          $strg,
                          $salt,
                          PBKDF2_ITERATIONS,
                          PBKDF2_HASH_BYTE_SIZE,
                          true
                        )
                      );
          return $password;
        }

        
        public function creerHash($strg=null, $iteration=1000){
            /* cette function : mcrypt_create_iv nest plus prise en charge
            //$salt = base64_encode(mcrypt_create_iv(PBKDF2_SALT_BYTE_SIZE, MCRYPT_DEV_URANDOM)); 
            */
            $salt = base64_encode(random_bytes(PBKDF2_SALT_BYTE_SIZE));
            $theHash = PBKDF2_HASH_ALGORITHM . ":" .
                        $iteration . ":" .
                        $salt . ":" .
                        base64_encode(
                          $this->pbkdf2(
                            PBKDF2_HASH_ALGORITHM,
                            $strg,
                            $salt,
                            PBKDF2_ITERATIONS,
                            PBKDF2_HASH_BYTE_SIZE,
                            true
                          )
                        );
            return $theHash;
          }
  


        /**
        //THESE COUPLES OF FUNCTIONS
        // ARE USED TO GENERATE A UNIC CODE
        **/


        public function RandGenerator(){
            $salt = base64_encode(mcrypt_create_iv(6, MCRYPT_DEV_URANDOM));
            return $salt;
        }

        public function cleanMe($toBeClean){
            if(isset($toBeClean)){
              $cleanedVal=preg_replace("/[\/\&%#\$+]/", "1", $toBeClean);
              return $cleanedVal;
            }
        }

        private function get2firstTag(){
            $salt = base64_encode(mcrypt_create_iv(3, MCRYPT_DEV_URANDOM));
            return $salt;
        }


    }

?>
