<?php
/**
 * Created by PhpStorm.
 * User: yazdaan
 * Date: 23/08/14
 * Time: 18:07
 */

//    define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
//    include(THISROOT . "/dbAccess.php");
//    require_once(THISROOT . "/common.php");
    require_once("formValidation.php");

    function sendNotification($message , $relocatePath = null){
        echo "<script> sendMessage(\"$message\", \"$relocatePath\" ); </script>";
    }

    function JSONResultSet( $resultSet )
    {
        $out = "{\n";

        foreach( $resultSet as $row ){
            $out .= "{ ";
            for( $i = 0; $i < 9; $i++){
                $out .= $row[ $i ];
                if ( $i != 9 - 1){
                    $out .= ", ";
                }
            }
            $out .= " }\n";
        }
        $out .= "}\n";

        echo $out;
    }

    function getGradeAndClass($text){
        $arrGradeClass = array();
        $text = trim( $text );
        $workingVal = "";

        for ($i = 0; $i < strlen($text); $i++)
        {
            $curr = substr($text, $i, 1);
            if(strcmp($curr, " ") !== 0){
                $workingVal .= $curr;
            }
        }
        $arrGradeClass[0] = "";
        for ($i = 0; $i < strlen($workingVal); $i++)
        {
            $curr = substr($workingVal, $i, 1);
            if(!is_numeric($curr)){
                break;
            }
            $arrGradeClass[0] .= $curr;
        }
        $arrGradeClass[1] = "";
        for ($x = 0; $x < strlen($workingVal); $x++)
        {
            $curr = substr($workingVal, $x, 1);
            if( preg_match("/[a-z]/i", $curr ) ){
                $arrGradeClass[1] .= strtoupper( $curr );
            }

        }
        return $arrGradeClass; //Grade in [0] and class in [1]
    }

    function merge_querystring($url, $query = null, $recursive = false)
    {
        // $url = 'http://www.google.com.au?q=apple&type=keyword';
        // $query = '?q=banana';
        // if there's a URL missing or no query string, return
        if($url == null)
            return false;
        if($query == null)
            return $url;
        // split the url into it's components
        $url_components = parse_url($url);
        // if we have the query string but no query on the original url
        // just return the URL + query string
        if(empty($url_components['query']))
            return $url.'?'.ltrim($query,'?');
        // turn the url's query string into an array
        parse_str($url_components['query'],$original_query_string);
        // turn the query string into an array
        parse_str(parse_url($query,PHP_URL_QUERY),$merged_query_string);
        // merge the query string
        if($recursive == true)
            $merged_result = array_merge_recursive($original_query_string,$merged_query_string);
        else
            $merged_result = array_merge($original_query_string,$merged_query_string);
        // Find the original query string in the URL and replace it with the new one
        return str_replace($url_components['query'],http_build_query($merged_result),$url);
    }

    function preparePhoneNumber( $phoneNumber )
    {
        $number = trim( $phoneNumber );

        if( isFilled( $phoneNumber ) )
        {
            if( strcmp( $number[ 0 ],  '+' ) != 0 )
            {
                if( strcmp( $number[ 0 ],  '0' ) != 0 )
                {
                    if( strcmp( $number[ 0 ],  '0' ) == 7 )
                    {
                        $number = '+94' . $number;
                    }
                    else
                    {
                        return "";
                    }
                }
                else
                {
                    $number = '+94' . substr( $number, 1 );
                }
            }
            return ( strlen( $number ) == 12 ? $number : "" ) ;
        }
        return null;
    }

/**
 * http://webcheatsheet.com/php/get_current_page_url.php
 */
    function curPageName() {
        return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
    }

/**
 * Getting configuration information
 */

    function getConfigData( $variable = null ){
        $config = include( "configuration/data.php" );
        if ( isset( $variable ) ){
            return $config[ $variable ];
        }
        else{
            return $config;
        }
    }

    function storeConfigData( $config ){
        file_put_contents( "configuration/data.php", '<?php return ' . var_export($config, true) . ';' );
    }

    function setConfigData( $variable, $value ){
        $config = getConfigData();
        $config[ $variable ] = $value;
        storeConfigData( $config );
    }

?>