<?php
ob_start();

// Database connection
$conn = new mysqli("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form 1 data from POST request
    $reportName = $_POST['HousingAssessment'];
    $reportDate = $_POST['reportdate'];
    $buildingName = $_POST['fname'];
    $gpsLocation = $_POST['gps'];
    
    //retrieve form 2 data 
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $country = $_POST['country'];
    $comments = $_POST['BNComments2'];
    $phoneNumber = $_POST['phoneNumber'];
    $numBuildings = $_POST['buildings'];
    $numFloors = $_POST['floors'];
    $unitType = $_POST['unitType'];
    $spaceType = $_POST['spaceType'];
    $groundClosed = $_POST['groundclosed'];
    
    //retrieve form 3 data 
    $totalRooms = $_POST['totalRooms'];
    $totalPeople = $_POST['totalPeople'];
    $occupancyComments = $_POST['occupancyComments'];
    $BNComments = $_POST['BNComments3'];

    //retrieve form 4 data
    $nObstructions = $_POST['nObstructions'];
    $sObstructions = $_POST['sObstructions'];
    $eObstructions = $_POST['eObstructions'];
    $wObstructions = $_POST['wObstructions'];
    $BNComments = $_POST['BNComments4'];

    //retrieve form 5 data
    $parkingArea = $_POST['ParkingArea'];
    $parkSec = $_POST['ParkSec'];
    $light = $_POST['Light'];
    $pComments = $_POST['pComments'];
    $bnComments = $_POST['BNComments5'];

    //retrieve form 6 data
    $monitored_outside = $_POST["monitored_outside"];
    $entry_controlled = $_POST["entry_controlled"];
    $comments = $_POST["BNComments6"];

    //retrieve form 7 data
    $is_access_secure = $_POST["WSS"];
    $locked_container_structure = $_POST["LockedWSS"];
    $comments = $_POST["BNComments7"];

    //retrieve form 8 data 
    $surrounding_population = $_POST["SP"];
    $crime_violence_history = $_POST["Crime"];
    $comments = $_POST["BNComments8"];

    //retrieve form 9 data 
    $complexDistance = $_POST['ComplexDistance'];
    $reinforced = $_POST['Reinforced'];
    $shield = $_POST['Shield'];
    $reStairwell = $_POST['ReStairwell'];
    $comments = $_POST['BNComments9'];
    
    //retrieve form 10 data
    $perimeterBarriers = $_POST['PB'];
    $perimeterLighting = $_POST['PL'];
    $gatedEntrance = $_POST['GatedEntrance'];
    $gateGuard = $_POST['GateGuard'];
    $comments = $_POST['BNComments10'];

    
    //retrieve form 11 data 
    $subGuards = $_POST['subGuards'];
    $military = $_POST['Military'];
    $comments = $_POST['BNComments11'];



    //retrieve form 12 data 
    $maintainKeys = $_POST['Maintain'];
    $roofAccess = $_POST['roofAccess'];
    $groundAccess = $_POST['groundAccess'];
    $publicParking = $_POST['Occupants'];
    $businessOffices = $_POST['BorC'];
    $obstruction = $_POST['Obstruction'];
    $mosquesNearby = $_POST['Mosques'];
    $outsideGroundsDesc = $_POST['groundOpenings'];
    $pointsOfEntryNumber = $_POST['pointEntry'];
    $comments = $_POST['BNComments12'];

    //retrieve form 13 data 
    // Retrieve form data for police
    $policeStation = $_POST['policeStation'];
    $policeDistance = $_POST['policeDistance'];
    $policeNumber = $_POST['policeNumber'];
    $policeTime = $_POST['policeTime'];
    // Retrieve form data for fire
    $fireStation = $_POST['fireStation'];
    $fireDistance = $_POST['fireDistance'];
    $fireNumber = $_POST['fireNumber'];
    $fireTime = $_POST['fireTime'];


    //retrieve form 14 data 
    $positiveAspects = $_POST['PosComments'];
    $negativeAspects = $_POST['NegComments'];

    //retrieve form 15 data
    $rsoComments = $_POST['RSO'];
    $miscellaneousInfo = $_POST['ai'];
    $bnComments = $_POST['BNComments15'];




    // 1 Insert data into locationdetails table for form 1
    $sqlLocation = "INSERT INTO locationdetails (LocationName) VALUES ('$reportName')";
    $conn->query($sqlLocation);
    $locationId = $conn->insert_id;

    // 1 Insert data into GeographicLocation table for form 1
    $sqlGeo = "INSERT INTO GeographicLocation (GPSLocation, LocationID) VALUES ('$gpsLocation', '$locationId')";
    $conn->query($sqlGeo);
    $geoLocationId = $conn->insert_id;

    // 1 Insert data into Form table with reference to GeographicLocation and locationdetails tables for form 1
    $sqlForm = "INSERT INTO Form (ReportName, BuildingName, GeoLocationID, LocationID, DateOfReport) VALUES ('$reportName', '$buildingName', '$geoLocationId', '$locationId', '$reportDate')";
    $conn->query($sqlForm);



    // 2 Insert data into Geographic Location Table for form 2
    $sql_geo = "INSERT INTO GeographicLocation (GPS, Address, City, State, Zip, Country) VALUES ('gps_value', '$address', '$city', '$state', '$zip', '$country')";
    $conn->query($sql_geo);
    $last_id = $conn->insert_id;

    // 2 Unit Requesting Assessment Table
    $sql_unit = "INSERT INTO UnitRequestingAssessment (UserID, BuildingPhoneNumber) VALUES ('$last_id', '$phoneNumber')";
    $conn->query($sql_unit);

    // 2 Residential Housing Gen Info Table
    $sql_residential = "INSERT INTO ResidentialHousingGenInfo (RHAGIID, NumBuildings, NumFloors, UnitType, SpaceType, GroundClosed) VALUES ('$last_id', '$numBuildings', '$numFloors', '$unitType', '$spaceType', '$groundClosed')";
    $conn->query($sql_residential);



    // 3 Occupancy information table
    $sql = "INSERT INTO occupancyinformation (TotalAptInComp, TotalPersonnelInComp, Comments, BNComments) VALUES ('$totalRooms', '$totalPeople', '$occupancyComments', '$BNComments')";
    $conn->query($sql);



    // 4 Standoff Information Table
    $sql = "INSERT INTO standoff_information (nObstructions, sObstructions, eObstructions, wObstructions, BNComments) VALUES ('$nObstructions', '$sObstructions', '$eObstructions', '$wObstructions', '$BNComments')";
    $conn->query($sql);



    // 5 Parking Information Table
    $sql = "INSERT INTO parkinginformation (LocationOfParking, SecurityForParking, Lighting, Comments) VALUES ('$parkingArea', '$parkSec', '$light', '$pComments')";
    $conn->query($sql);



    // 6 Entry and Circulaton Table
    $sql = "INSERT INTO entryandcirculationtable (vehiclesmonitored, entrycontrolled) VALUES ('$monitored_outside', '$entry_controlled')";
    $conn->query($sql);



    // 7  Water storage system table 
    $sql = "INSERT INTO waterstoragesystem (securedaccess, lockedcontainer) VALUES ('$is_access_secure', '$locked_container_structure')";
    $conn->query($sql);

    // 7 Get the waterstoragesystem primary key
    $waterstoragesystem_id = $conn->insert_id;

    // 7 Insert data into the form table with the foreign key reference
    $sql = "INSERT INTO form_table (waterstoragesystem, comments) VALUES ('$waterstoragesystem_id', '$comments')";
    $conn->query($sql);



    // 8 demographicsinfo table
    $sql = "INSERT INTO demographicsinfo (SurroundingPop, CrimeViolenceHistory) VALUES ('$surrounding_population', '$crime_violence_history')";
    $conn->query($sql);

    // 8 Get the demographicsinfo primary key
    $demographicsID = $conn->insert_id;

    // 8 Insert data into the form table with the foreign key reference
    $sql = "INSERT INTO form_table (demographicsID, comments) VALUES ('$demographicsID', '$comments')";
    $conn->query($sql);



    // 9 Rallypointsinfo table
    $sql = "INSERT INTO rallypointsinfo (ParkingDistance, ReinforcedConcBasementOrParking, ShieldedEvacSiteMeters, ReinforcedConcStairwell) VALUES ('$complexDistance', '$reinforced', '$shield', '$reStairwell')";
    $conn->query($sql);



    //10 perimetersecurityinfo table
    $sql = "INSERT INTO perimetersecurityinfo (PerimeterBarrPresent, PerimeterLight, PerimeterBarrType, GateGuard) VALUES ('$perimeterBarriers', '$perimeterLighting', '$gatedEntrance', '$gateGuard')";
    $conn->query($sql);


    //11 securitymanninginfo table
     $sql = "INSERT INTO securitymanninginfo (SubGuards, MilitarySecGuard) VALUES ('$subGuards', '$military')";
    $conn->query($sql);


    // 12 residentialhousinggeninfo table
    $sql = "INSERT INTO residentialhousinggeninfo (EntranceKeyHolders, RoofEntry, OutsideGroundsPresent, PublicParking, BusinessOfficesPresent, Obstruction, MosquesNearby, OutsideGroundsDesc, PointsofEntryNumber, Comments) VALUES ('$maintainKeys', '$roofAccess', '$groundAccess', '$publicParking', '$businessOffices', '$obstruction', '$mosquesNearby', '$outsideGroundsDesc', '$pointsOfEntryNumber', '$comments')";
    $conn->query($sql);


    // 13 policeforce table
    $sqlPolice = "INSERT INTO policeforce (PoliceForce, Distance, PhoneNumber, PoliceLocation) VALUES ('$policeStation', '$policeDistance', '$policeNumber', '$policeTime')";
    $conn->query($sqlPolice);
    
    // 13 firedepartment table
    $sqlFire = "INSERT INTO firedepartment (FireDepartment, Distance, PhoneNumber, FireLocation) VALUES ('$fireStation', '$fireDistance', '$fireNumber', '$fireTime')";
    $conn->query($sqlFire);
    


    // 14 PositiveNegative table
    $sql = "INSERT INTO PositiveNegative (PositiveAspects, NegativeAspects) VALUES ('$positiveAspects', '$negativeAspects')";
    $conn->query($sql);

    // 15 annualassessment table
    $sql = "INSERT INTO annualassessment (RSOComments, MiscellaneousInfo, BNComments) VALUES ('$rsoComments', '$miscellaneousInfo', '$bnComments')";
    $conn->query($sql);

    // Redirect to confirmation page
    header("Location: confirmation.html");
    exit();
}

// Close the connection
$conn->close();

ob_end_flush();
?>