<?php
	
    function dimanche_paques($annee)
    {
        return date("Y-m-d", easter_date($annee));
	}
    function vendredi_saint($annee)
    {
        $dimanche_paques = dimanche_paques($annee);
        return date("Y-m-d", strtotime("$dimanche_paques -2 day"));
	}
    function lundi_paques($annee)
    {
        $dimanche_paques = dimanche_paques($annee);
        return date("Y-m-d", strtotime("$dimanche_paques +1 day"));
	}
    function jeudi_ascension($annee)
    {
        $dimanche_paques = dimanche_paques($annee);
        return date("Y-m-d", strtotime("$dimanche_paques +39 day"));
	}
    function lundi_pentecote($annee)
    {
        $dimanche_paques = dimanche_paques($annee);
        return date("Y-m-d", strtotime("$dimanche_paques +50 day"));
	}
    
    function est_weekend($date) {
        return (date('N', strtotime($date)) >= 6);
	}
    function jours_feries($annee, $alsacemoselle=false)
    {
        $jours_feries = array
        (    dimanche_paques($annee)
        ,    lundi_paques($annee)
        ,    jeudi_ascension($annee)
        ,    lundi_pentecote($annee)
        
        ,    "$annee-01-01"        //    Nouvel an
        ,    "$annee-05-01"        //    Fête du travail
        ,    "$annee-05-08"        //    Armistice 1945
		,    "$annee-15-08"        //    Assomption
        ,    "$annee-05-15"        //    Assomption
        ,    "$annee-07-14"        //    Fête nationale
        ,    "$annee-11-11"        //    Armistice 1918
        ,    "$annee-11-01"        //    Toussaint
        ,    "$annee-12-25"        //    Noël
        );
        if($alsacemoselle)
        {
            $jours_feries[] = "$annee-12-26";
            $jours_feries[] = vendredi_saint($annee);
		}
        sort($jours_feries);
        return $jours_feries;
	}
    
    function est_ferie($jour)
    {
        $jour = date("Y-m-d", strtotime($jour));
        $annee = substr($jour, 0, 4);
        return in_array($jour, jours_feries($annee, false));
	}
	
    function est_bissextile($annee)
    {
        return date("m-d", strtotime("$annee-02-29")) == "02-29";
	}
    
    function nbr_jours_feries_sans_we ($annee)
    {
        $jours_feries = jours_feries($annee);
        $nbr_jours_feries_sans_we = 0;
		foreach ($jours_feries as $jour_ferie){
			if (!est_weekend($jour_ferie)){
				$nbr_jours_feries_sans_we++;
			}
		}
        return $nbr_jours_feries_sans_we;
	}
    
    function nbr_jours_we ($annee)
    {
        $nbr_jours_we = 0;
        foreach (range(1, 12) as $mois){
            $total_days=cal_days_in_month(CAL_GREGORIAN, $mois, $annee);
            for($i=1;$i<=$total_days;$i++)
            if(date('N',strtotime($annee.'-'.$mois.'-'.$i))==6 or date('N',strtotime($annee.'-'.$mois.'-'.$i))==7)
            $nbr_jours_we++;
		}
        return $nbr_jours_we;
	}
    
    function nbr_jours_annee($annee)
    {
        if (est_bissextile($annee)) return 366;
        else return 365;
	}
    
    function nbr_jours_rtt ($annee, $nbr_jours_travailles, $nbr_conges_payes){
        return nbr_jours_annee($annee) - $nbr_jours_travailles - nbr_jours_we ($annee) - nbr_jours_feries_sans_we ($annee) - $nbr_conges_payes;
	}
	
	$nbr_jours_rtt = nbr_jours_rtt($_POST["annee"],$_POST["nbr_jours_travailles"],$_POST["nbr_conge_payes"]);
	
    header("Location:index.php?rtt=$nbr_jours_rtt");
?>