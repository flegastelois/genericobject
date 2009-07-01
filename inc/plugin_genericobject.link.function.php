<?php
/*
 ----------------------------------------------------------------------
 GLPI - Gestionnaire Libre de Parc Informatique
 Copyright (C) 2003-2008 by the INDEPNET Development Team.

 http://indepnet.net/   http://glpi-project.org/
 ----------------------------------------------------------------------

 LICENSE

	This file is part of GLPI.

    GLPI is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    GLPI is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with GLPI; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 ------------------------------------------------------------------------
*/

// Original Author of file: Walid Nouh
// Purpose of file:
// ----------------------------------------------------------------------
function plugin_genericobject_showDeviceTypeLinks($target,$ID)
{
	$object_type = new PluginGenericObjectType;
	$object_tye->getFromDB($ID);
	
	plugin_genericobject_getLinksByType($object_type->fields["device_type"]);
	
}

function plugin_genericobject_getLinksByType($device_type)
{
	global $DB;
	$query = "SELECT destination_type FROM `glpi_plugin_genericobject_type_links` WHERE device_type=$device_type";
	$result = $DB->query($query);
	$types = array();
	while ($datas = $DB->fetch_array($result))
		$types[] = $datas["destination_type"];
	return $types;	
}
?>