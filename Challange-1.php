<?php

	/*
	 * Conditions We assume that the input has always 20 elements The skill rating
	 * is from 1 - 10 There will be 2 team always
    */
    
    $caseA = array(8, 5, 6, 9, 3, 8, 2, 4, 6, 10, 8, 5, 6, 1, 7, 10, 5, 3, 7, 6);
    $caseB = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 2, 1, 2, 3, 4, 5, 6, 7, 8, 9, 3);
    $caseC = array(1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4 );

    function calculateTeams($arr) {

        $teamA = array(count($arr)/2); // Create arrays
        $teamB = array(count($arr)/2);
        
		
		$skillsA = 0; // Avg of skills
		$skillsB = 0;
		$iTeamA = 0; // Index of teams
		$iTeamB = 0;



        // sort array asc order
        sort($arr);

        // From highest to lowest because the kids with low skills
		// will make the lowest difference between teams
		for ($i = (count($arr) - 1); $i >= 0; $i--) {

			if ($skillsA <= $skillsB) {// add to A
                    $teamA[$iTeamA] = $arr[$i];
                    $skillsA += $arr[$i];
                    $iTeamA++;
			} else { // Add to B
                    $teamB[$iTeamB] = $arr[$i];
                    $skillsB += $arr[$i];
                    $iTeamB++;
			}
        }

        echo '<pre> Team A: </br> Skills = '.array_sum($teamA)." </br> Elements: ".implode(", ", $teamA);
        echo '<pre> Team B: </br> Skills = '.array_sum($teamB)." </br> Elements: ".implode(", ", $teamB);
        
    }

    //Case A
    echo "Players skill level: ";
    echo implode(", ", $caseA);
    echo '<pre>';
    calculateTeams($caseA);

    //Case B
    echo "\n\n \n Players skill level: ";
    echo implode(", ", $caseB);
    echo '<pre>';
    calculateTeams($caseB);

    //Case C
    echo "\n\n \n Players skill level: ";
    echo implode(", ", $caseC);
    echo '<pre>';
    calculateTeams($caseC);

?>