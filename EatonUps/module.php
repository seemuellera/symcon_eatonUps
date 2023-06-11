<?php

// Klassendefinition
class EatonUps extends IPSModule {
 
	// Der Konstruktor des Moduls
	// Überschreibt den Standard Kontruktor von IPS
	public function __construct($InstanceID) {
		// Diese Zeile nicht löschen
		parent::__construct($InstanceID);

		// Selbsterstellter Code
		// Define all the data
		$this->snmpVariables = Array(
			Array("ident" => "Model", 				"caption" => "Model", 						"type" => "String", 	"profile" => false, 						"oid" => '1.3.6.1.4.1.534.10.2.1.2.0', 			"factor" => false, 	"writeable" => false),
			Array("ident" => "SerialNumber", 		"caption" => "Serial Number", 				"type" => "String", 	"profile" => false, 						"oid" => '1.3.6.1.4.1.534.10.2.1.5.0', 			"factor" => false, 	"writeable" => false),
			Array("ident" => "CardFirmwareVersion", "caption" => "Card Firmware Version",		"type" => "String", 	"profile" => false, 						"oid" => '1.3.6.1.4.1.534.10.2.1.7.0', 			"factor" => false, 	"writeable" => false),
			Array("ident" => "FirmwareVersion", 	"caption" => "Firmware Version", 			"type" => "String", 	"profile" => false, 						"oid" => '1.3.6.1.4.1.534.10.2.1.3.0', 			"factor" => false, 	"writeable" => false),
			Array("ident" => "OutputVoltage", 		"caption" => "Output Voltage", 				"type" => "Float", 		"profile" => "~Volt.230", 					"oid" => '1.3.6.1.4.1.534.10.2.2.3.1.0', 		"factor" => 0.1, 	"writeable" => false),
			Array("ident" => "OutputCurrent", 		"caption" => "Output Current", 				"type" => "Float", 		"profile" => "~Ampere.16", 					"oid" => '1.3.6.1.4.1.534.10.2.2.3.2.0', 		"factor" => 0.1, 	"writeable" => false),
			Array("ident" => "InputVoltage", 		"caption" => "Input Voltage", 				"type" => "Float", 		"profile" => "~Volt.230", 					"oid" => '1.3.6.1.4.1.534.10.2.2.2.1.2.1', 		"factor" => 0.1, 	"writeable" => false),
			Array("ident" => "InputFrequency", 		"caption" => "Input Frequency", 			"type" => "Float", 		"profile" => "~Hertz.50", 					"oid" => '1.3.6.1.4.1.534.10.2.2.2.1.3.1', 		"factor" => 0.1, 	"writeable" => false),
			Array("ident" => "RemainingMinutes", 	"caption" => "Remaining Runtime", 			"type" => "Integer", 	"profile" => "~TimePeriodMin.KNX",			"oid" => '1.3.6.1.2.1.33.1.2.3.0', 				"factor" => false, 	"writeable" => false),
			Array("ident" => "BatteryCapacity", 	"caption" => "Battery Capacity", 			"type" => "Integer", 	"profile" => "~Battery.100",				"oid" => '1.3.6.1.2.1.33.1.2.4.0', 				"factor" => false, 	"writeable" => false),
			Array("ident" => "BatteryVoltage", 		"caption" => "Battery Voltage", 			"type" => "Float", 		"profile" => "~Volt", 						"oid" => '1.3.6.1.2.1.33.1.2.5.0', 				"factor" => 0.1, 	"writeable" => false),
			Array("ident" => "BatteryStatus", 		"caption" => "Battery Status", 				"type" => "Integer", 	"profile" => "EATONUPS.BatteryStatus",		"oid" => '1.3.6.1.2.1.33.1.2.1.0', 				"factor" => false, 	"writeable" => false),
			Array("ident" => "OutputPower", 		"caption" => "Output Power", 				"type" => "Float", 		"profile" => "~Watt.3680",					"oid" => '1.3.6.1.2.1.33.1.4.4.1.4.1', 			"factor" => false, 	"writeable" => false),
			Array("ident" => "OutputLoad", 			"caption" => "Output Load", 				"type" => "Integer", 	"profile" => "~Intensity.100",				"oid" => '1.3.6.1.2.1.33.1.4.4.1.5.1',			"factor" => false, 	"writeable" => false),
			Array("ident" => "InternalTemperature",	"caption" => "Internal Temperature", 		"type" => "Float", 		"profile" => "~Temperature",				"oid" => '1.3.6.1.4.1.534.1.6.1.0',				"factor" => false, 	"writeable" => false),
			Array("ident" => "InputSource",			"caption" => "Input Source", 				"type" => "Integer", 	"profile" => "EATONUPS.InputSource",		"oid" => '1.3.6.1.4.1.534.1.3.5.0',				"factor" => false, 	"writeable" => false),
			Array("ident" => "OutputSource",		"caption" => "Output Source", 				"type" => "Integer", 	"profile" => "EATONUPS.OutputSource",		"oid" => '1.3.6.1.4.1.534.1.4.5.0',				"factor" => false, 	"writeable" => false),
			Array("ident" => "BatteryManagementStatus",	"caption" => "Battery Management Status", "type" => "Integer", 	"profile" => "EATONUPS.BatteryManagementStatus", "oid" => '1.3.6.1.4.1.534.1.2.5.0',		"factor" => false, 	"writeable" => false),
			Array("ident" => "BatteryTestStatus",	"caption" => "Battery Test Status", 		"type" => "Integer", 	"profile" => "EATONUPS.BatteryTestStatus",	"oid" => '1.3.6.1.4.1.534.1.8.2.0',				"factor" => false, 	"writeable" => false)
		);
	}
 
	// Überschreibt die interne IPS_Create($id) Funktion
	public function Create() {
		
		// Diese Zeile nicht löschen.
		parent::Create();

		// Properties
		$this->RegisterPropertyString("Sender","EatonUps");
		$this->RegisterPropertyInteger("RefreshInterval",0);
		$this->RegisterPropertyInteger("SnmpInstance",0);
		$this->RegisterPropertyBoolean("DebugOutput",false);

		// Variable profiles
		$variableProfileBatteryStatus = "EATONUPS.BatteryStatus";
		if (IPS_VariableProfileExists($variableProfileBatteryStatus) ) {
		
			IPS_DeleteVariableProfile($variableProfileBatteryStatus);
		}			
		IPS_CreateVariableProfile($variableProfileBatteryStatus, 1);
		IPS_SetVariableProfileIcon($variableProfileBatteryStatus, "Battery");
		IPS_SetVariableProfileAssociation($variableProfileBatteryStatus, 1, "Unknown", "", 0xFF00FF);
		IPS_SetVariableProfileAssociation($variableProfileBatteryStatus, 2, "Normal", "", 0x00FF00);
		IPS_SetVariableProfileAssociation($variableProfileBatteryStatus, 3, "Low", "", 0xFFFF00);
		IPS_SetVariableProfileAssociation($variableProfileBatteryStatus, 4, "Depleted", "", 0xFF0000);
	
		$variableProfileInputSource = "EATONUPS.InputSource";
		if (IPS_VariableProfileExists($variableProfileInputSource) ) {
		
			IPS_DeleteVariableProfile($variableProfileInputSource);
		}			
		IPS_CreateVariableProfile($variableProfileInputSource, 1);
		IPS_SetVariableProfileIcon($variableProfileInputSource, "Electricity");
		IPS_SetVariableProfileAssociation($variableProfileInputSource, 1, "Other", "", -1);
		IPS_SetVariableProfileAssociation($variableProfileInputSource, 2, "None", "", -1);
		IPS_SetVariableProfileAssociation($variableProfileInputSource, 3, "Primary Utility", "", 0x00FF00);
		IPS_SetVariableProfileAssociation($variableProfileInputSource, 4, "Bypass Feed", "", -1);
		IPS_SetVariableProfileAssociation($variableProfileInputSource, 5, "Secondary Utility", "", -1);
		IPS_SetVariableProfileAssociation($variableProfileInputSource, 6, "Generator", "", -1);
		IPS_SetVariableProfileAssociation($variableProfileInputSource, 7, "Flywheel", "", -1);
		IPS_SetVariableProfileAssociation($variableProfileInputSource, 8, "Fuel Cell", "", -1);

		$variableProfileOutputSource = "EATONUPS.OutputSource";
		if (IPS_VariableProfileExists($variableProfileOutputSource) ) {
		
			IPS_DeleteVariableProfile($variableProfileOutputSource);
		}			
		IPS_CreateVariableProfile($variableProfileOutputSource, 1);
		IPS_SetVariableProfileIcon($variableProfileOutputSource, "Electricity");
		IPS_SetVariableProfileAssociation($variableProfileOutputSource, 1, "Other", "", -1);
		IPS_SetVariableProfileAssociation($variableProfileOutputSource, 2, "None", "", -1);
		IPS_SetVariableProfileAssociation($variableProfileOutputSource, 3, "Normal", "", 0x00FF00);
		IPS_SetVariableProfileAssociation($variableProfileOutputSource, 4, "Bypass Feed", "", -1);
		IPS_SetVariableProfileAssociation($variableProfileOutputSource, 5, "Battery", "", -1);
		IPS_SetVariableProfileAssociation($variableProfileOutputSource, 6, "Booster", "", -1);
		IPS_SetVariableProfileAssociation($variableProfileOutputSource, 7, "Reducer", "", -1);
		IPS_SetVariableProfileAssociation($variableProfileOutputSource, 8, "Parallel Capacity", "", -1);
		IPS_SetVariableProfileAssociation($variableProfileOutputSource, 9, "Parallel Redundant", "", -1);
		IPS_SetVariableProfileAssociation($variableProfileOutputSource, 10, "High Efficiency Mode", "", -1);

		$variableProfileBatteryManagementStatus = "EATONUPS.BatteryManagementStatus";
		if (IPS_VariableProfileExists($variableProfileBatteryManagementStatus) ) {
		
			IPS_DeleteVariableProfile($variableProfileBatteryManagementStatus);
		}			
		IPS_CreateVariableProfile($variableProfileBatteryManagementStatus, 1);
		IPS_SetVariableProfileIcon($variableProfileBatteryManagementStatus, "Battery");
		IPS_SetVariableProfileAssociation($variableProfileBatteryManagementStatus, 1, "Charging", "", 0xFFFF00);
		IPS_SetVariableProfileAssociation($variableProfileBatteryManagementStatus, 2, "Discharging", "", 0xFFFF00);
		IPS_SetVariableProfileAssociation($variableProfileBatteryManagementStatus, 3, "Floating", "", 0x00FF00);
		IPS_SetVariableProfileAssociation($variableProfileBatteryManagementStatus, 4, "Resting", "", 0x00FF00);
		IPS_SetVariableProfileAssociation($variableProfileBatteryManagementStatus, 5, "Unknown", "", -1);
		IPS_SetVariableProfileAssociation($variableProfileBatteryManagementStatus, 6, "Disconnected", "", 0xFF0000);
		IPS_SetVariableProfileAssociation($variableProfileBatteryManagementStatus, 7, "Under Test", "", -1);
		IPS_SetVariableProfileAssociation($variableProfileBatteryManagementStatus, 8, "Check Battery", "", 0xFF0000);
	
		$variableProfileBatteryTestStatus = "EATONUPS.BatteryTestStatus";
		if (IPS_VariableProfileExists($variableProfileBatteryTestStatus) ) {
		
			IPS_DeleteVariableProfile($variableProfileBatteryTestStatus);
		}			
		IPS_CreateVariableProfile($variableProfileBatteryTestStatus, 1);
		IPS_SetVariableProfileIcon($variableProfileBatteryTestStatus, "Battery");
		IPS_SetVariableProfileAssociation($variableProfileBatteryTestStatus, 1, "Unknown", "", -1);
		IPS_SetVariableProfileAssociation($variableProfileBatteryTestStatus, 2, "Passed", "", 0x00FF00);
		IPS_SetVariableProfileAssociation($variableProfileBatteryTestStatus, 3, "Failed", "", 0xFF0000);
		IPS_SetVariableProfileAssociation($variableProfileBatteryTestStatus, 4, "In Progress", "", -1);
		IPS_SetVariableProfileAssociation($variableProfileBatteryTestStatus, 5, "Not Supported", "", -1);
		IPS_SetVariableProfileAssociation($variableProfileBatteryTestStatus, 6, "Inhibited", "", -1);
		IPS_SetVariableProfileAssociation($variableProfileBatteryTestStatus, 7, "Scheduled", "", -1);

		// Variables
		$stringVariables = $this->GetVariablesByType("String");
		foreach ($stringVariables as $currentVariable) {

			if ($currentVariable['profile']) {

				$this->RegisterVariableString($currentVariable['ident'], $currentVariable['caption'], $currentVariable['profile']);
			}
			else {

				$this->RegisterVariableString($currentVariable['ident'], $currentVariable['caption']);
			}
		}

		$stringVariables = $this->GetVariablesByType("Float");
		foreach ($stringVariables as $currentVariable) {

			if ($currentVariable['profile']) {

				$this->RegisterVariableFloat($currentVariable['ident'], $currentVariable['caption'], $currentVariable['profile']);
			}
			else {

				$this->RegisterVariableFloat($currentVariable['ident'], $currentVariable['caption']);
			}
		}
		
		$stringVariables = $this->GetVariablesByType("Integer");
		foreach ($stringVariables as $currentVariable) {

			if ($currentVariable['profile']) {

				$this->RegisterVariableInteger($currentVariable['ident'], $currentVariable['caption'], $currentVariable['profile']);
			}
			else {

				$this->RegisterVariableInteger($currentVariable['ident'], $currentVariable['caption']);
			}
		}
		
		// Timer
		$this->RegisterTimer("RefreshInformation", 0, 'EATONUPS_RefreshInformation($_IPS[\'TARGET\']);');

	}

        // Überschreibt die intere IPS_ApplyChanges($id) Funktion
    public function ApplyChanges() {

		$newInterval = $this->ReadPropertyInteger("RefreshInterval") * 1000;
		$this->SetTimerInterval("RefreshInformation", $newInterval);

		// Editable values
		$writeableIdents = $this->GetWriteableVariableIdents();
		if (count($writeableIdents) > 0) {

			foreach ($writeableIdents as $currentIdent) {

				$this->EnableAction($currentIdent);
			}
		}

		// Diese Zeile nicht löschen
		parent::ApplyChanges();
	}

	public function RequestAction($Ident, $Value) {
	
	
		switch ($Ident) {
		
			case "ColdStartDelay":
				$this->SetWriteableVariable($Ident, $Value);
				SetValue($this->GetIDForIdent($Ident), $Value);
				break;
			default:
				$this->LogMessage("Invalid Ident: $Ident","CRIT");
		}
	}

	public function GetConfigurationForm() {

        	
		// Initialize the form
		$form = Array(
            		"elements" => Array(),
					"actions" => Array()
        		);

		// Add the Elements
		$form['elements'][] = Array("type" => "NumberSpinner", "name" => "RefreshInterval", "caption" => "Refresh Interval");
		$form['elements'][] = Array("type" => "CheckBox", "name" => "DebugOutput", "caption" => "Enable Debug Output");
		$form['elements'][] = Array("type" => "SelectInstance", "name" => "SnmpInstance", "caption" => "SNMP instance");

		// Add the buttons for the test center
        $form['actions'][] = Array("type" => "Button", "label" => "Refresh Overall Status", "onClick" => 'EATONUPS_RefreshInformation($id);');

		// Return the completed form
		return json_encode($form);

	}

    public function RefreshInformation() {

		$oid_mapping_table 		= $this->GetOidMappingTable();
		$factor_mapping_table 	= $this->GetFactorMappingTable();

		$this->UpdateVariables($oid_mapping_table, $factor_mapping_table);
	}

	// Version 1.0
	protected function LogMessage($message, $severity = 'INFO') {
		
		$logMappings = Array();
		// $logMappings['DEBUG'] 	= 10206; Deactivated the normal debug, because it is not active
		$logMappings['DEBUG'] 	= 10201;
		$logMappings['INFO']	= 10201;
		$logMappings['NOTIFY']	= 10203;
		$logMappings['WARN'] 	= 10204;
		$logMappings['CRIT']	= 10205;
		
		if ( ($severity == 'DEBUG') && ($this->ReadPropertyBoolean('DebugOutput') == false )) {
			
			return;
		}
		
		$messageComplete = $severity . " - " . $message;
		parent::LogMessage($messageComplete, $logMappings[$severity]);
	}
		
	
	protected function UpdateVariables($oids, $factors) {
	
		$result = $this->SnmpGet($oids);
		
		foreach ($oids as $varIdent => $varOid) {
		
			if (array_key_exists($varIdent, $factors)) {

				$this->LogMessage("Using Conversion Factor " . $factors[$varIdent] . " for Ident $varIdent", "DEBUG");

				SetValue($this->GetIDForIdent($varIdent), $result[$varOid] * $factors[$varIdent]);
			}
			else {
			
				SetValue($this->GetIDForIdent($varIdent), $result[$varOid]);
			}
		}
	}

	protected function SnmpGet($oids) {
	
		$result = IPSSNMP_ReadSNMP($this->ReadPropertyInteger("SnmpInstance"), $oids);	
		
		if (count($result) == 0) {

			$this->LogMessage("Unable to retrieve information via SNMP","CRIT");
			$this->SetStatus(200);
			return false;
		}
		else {

			$this->SetStatus(102);
		}

		$this->LogMessage("Number of SNMP entries found: " . count($result), "DEBUG");

		return $result;
	}

	protected function GetVariablesByType($type) {

		$variables = Array();

		foreach ($this->snmpVariables as $currentVariable) {

			if($currentVariable['type'] == $type) {

				$variables[] = $currentVariable;
			}
		}

		return $variables;
	}

	protected function GetOidMappingTable() {

		$mappingTable = Array();

		foreach ($this->snmpVariables as $currentVariable) {
		
			$mappingTable[$currentVariable['ident']] = $currentVariable['oid'];
		}

		return $mappingTable;
	}

	protected function GetFactorMappingTable() {

		$mappingTable = Array();

		foreach ($this->snmpVariables as $currentVariable) {
		
			if ($currentVariable['factor']) {
			
				$mappingTable[$currentVariable['ident']] = $currentVariable['factor'];
			}
		}

		return $mappingTable;
	}

	protected function GetWriteableVariableIdents() {

		$idents = Array();

		foreach ($this->snmpVariables as $currentVariable) {
		
			if ($currentVariable['writeable']) {
			
				$idents[] = $currentVariable['ident'];
			}
		}

		return $idents;
	}

	protected function SetWriteableVariable($ident, $value) {

		foreach ($this->snmpVariables as $currentVariable) {
		
			if ($currentVariable['ident'] == $ident) {
			
				$oid = $currentVariable['oid'];
				if ($currentVariable['type'] == 'String') {
					
					$type = 's';
				}
				else {

					$type = 'i';
				}
			}
		}

		IPSSNMP_WriteSNMPbyOID($this->ReadPropertyInteger("SnmpInstance"), $oid, $value, $type);		
	}
}