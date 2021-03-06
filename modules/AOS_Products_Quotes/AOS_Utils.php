<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/**
 * Products, Quotations & Invoices modules.
 * Extensions to SugarCRM
 * @package Advanced OpenSales for SugarCRM
 * @subpackage Products
 * @copyright SalesAgility Ltd http://www.salesagility.com
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU AFFERO GENERAL PUBLIC LICENSE
 * along with this program; if not, see http://www.gnu.org/licenses
 * or write to the Free Software Foundation,Inc., 51 Franklin Street,
 * Fifth Floor, Boston, MA 02110-1301  USA
 *
 * @author Salesagility Ltd <info@salesagility.com>
 */

function perform_aos_save($focus){
    //US DOLLAR

    foreach($focus->field_defs as $field){

        if(isset($focus->field_defs[$field['name'].'_usdollar'])){

            $fieldName = $field['name'].'_usdollar';

            $focus->$fieldName = '';
            if(!number_empty($focus->field_defs[$field['name']])){
                $currency = new Currency();
                $currency->retrieve($focus->currency_id);
                $focus->$fieldName = $currency->convertToDollar(unformat_number($focus->$field['name']));
            }

        }

    }
}