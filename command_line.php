<?php

foreach( $argv as $argument ) {
        if( $argument == $argv[ 0 ] ) continue;
        $pair = explode( "=", $argument );
        $variableName = substr( $pair[ 0 ], 2 );
        $variableValue = $pair[ 1 ];
        echo $variableName . " = " . $variableValue . "\n";
        // Optionally store the variable in $_REQUEST
        $_REQUEST[ $variableName ] = $variableValue;
}

?>
