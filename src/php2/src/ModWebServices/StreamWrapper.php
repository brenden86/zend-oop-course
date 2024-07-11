<?php
class DataStream {
    public $position, $data;
    public function stream_open($path){
        $this->data = parse_url($path)["host"];
        $this->position = 0;
        return true;
    }

	public function stream_write($input){
	    global $data; // Store in the global variable
		$strlen = strlen($input);
		$data = substr($input, 0, $this->position) . $input . substr($input, $this->position += $strlen);
		return $strlen;
	}
}

// Register the new stream class
stream_wrapper_register("mystream", "DataStream");

// Initialize the data store variable to stream to
$data = "";

// Open the stream resource
$fh = fopen("mystream://data", "r+");

// Write to the stream resource
fwrite($fh, 'some new stuff');
fwrite($fh, 'something else');

// Close the resource
fclose($fh);
