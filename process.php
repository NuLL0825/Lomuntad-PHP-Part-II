<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Word Frequency Counter</title>
    <link rel="stylesheet" type="text/css" href="prostyles.css">

</head>
<body>
    <h1>Word Frequency Counter</h1>
    
	
	<h2>Words:</h2>
	
	<?php
	
    //$myText= $_POST['text'];
	//$delimiters = '/[,\.;!\s]+/';
	//$commonWords = array("is", "a", "the", "and", "in", "it", "so", "on");
	
	//$words = preg_split($delimiters, strtolower($myText), -1, PREG_SPLIT_NO_EMPTY);
	//$filter = array_diff($words, $commonWords);
	//$wordFrequency = array_count_values($filter);
	
	//foreach ($wordFrequency as $word => $frequency) {
	// echo "$word: $frequency<br>";
	//}
	
	function splitWords($myText, $delimiters) {
		$arrayOfWords = preg_split($delimiters, strtolower($myText), -1, PREG_SPLIT_NO_EMPTY);
		return $arrayOfWords;
	}
	
	function filterWords($words, $commonWords) {
		$filter = array_diff($words, $commonWords);
		return $filter;
	}
	
	function calculateFrequency($filteredWords) {
		$wordFreq = array_count_values($filteredWords);
		return $wordFreq;
	}
	
	function sortWF($wordFrequency, $sortOrder) {
        if ($sortOrder == "asc") {
            asort($wordFrequency);
        } else {
            arsort($wordFrequency);
        }
        return $wordFrequency;
	}
	
	function limitWF($sortedWF, $wordLimit) {
        $result = array_slice($sortedWF, 0, $wordLimit);
		return $result;
    }
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$myText = $_POST['text'];
		$sortOrder = $_POST['sort'];
		$wordLimit = (int)$_POST['limit'];
		$delimiters = '/[,\.;!\s]+/';
		$commonWords = array("is", "a", "the", "and", "in", "it", "so", "on");
		
		if ($wordLimit <= 0) {
			echo '<p>Number of Words to Display Invalid</p>';
		} else {
			$words = splitWords($myText, $delimiters);
			$filteredWords = filterWords($words, $commonWords);
			$wordFrequency = calculateFrequency($filteredWords);
			$sortedWF = sortWF($wordFrequency, $sortOrder);
			$limitedWF = limitWF($sortedWF, $wordLimit);
			foreach ($limitedWF as $word => $frequency) {
				echo "$word: $frequency<br>";
			}
		}
	}
	?>
	
</body>
</html>
