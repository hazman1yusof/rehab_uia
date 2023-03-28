<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', "DashboardController@redirect");

Route::get('/login', 'SessionController@index')->name('login');

Route::post('/login', 'SessionController@login');

Route::get('/signup', 'SessionController@show_signup');

Route::post('/signup', 'SessionController@signup');

Route::get('/logout','SessionController@destroy');

Route::get('/user_maintenance', "UserMaintenanceController@show");
Route::get('/user_maintenance/table', "UserMaintenanceController@table");
Route::post('/user_maintenance/form', "UserMaintenanceController@form");

Route::get('/user_maintenance/{id}', "UserMaintenanceController@chg_password");
Route::post('/user_maintenance/{id}', "UserMaintenanceController@chg_password_save");


//// menu mainatenance page ///
Route::get('/menu_maintenance','setup\MenuMaintenanceController@show');
Route::get('/menu_maintenance/table','setup\MenuMaintenanceController@table');
Route::post('/menu_maintenance/form','setup\MenuMaintenanceController@form');

//// group mainatenance page ///
Route::get('/group_maintenance','setup\GroupMaintenanceController@show');
Route::get('/group_maintenance/table','setup\GroupMaintenanceController@table');
Route::post('/group_maintenance/form','setup\GroupMaintenanceController@form');

Route::get('/pivot', "PivotController@show");

Route::get('/pivot_get', "PivotController@get_json_pivot");

Route::get('/dialysis','DialysisController@index');
Route::get('/dialysis/table','DialysisController@table');
Route::post('/dialysis/form','DialysisController@form');
Route::get('/dialysis_event','DialysisController@dialysis_event');
Route::post('/change_status', "DialysisController@change_status");
Route::post('/save_dialysis', "DialysisController@save_dialysis");
Route::post('/save_dialysis_completed', "DialysisController@save_dialysis_completed");
Route::post('/save_epis_dialysis', "DialysisController@save_epis_dialysis");
Route::get('/get_data_dialysis', "DialysisController@get_data_dialysis");
Route::post('/dialysis_transaction_save', "DialysisController@dialysis_transaction_save");
Route::get('/check_pt_mode', "DialysisController@check_pt_mode");
Route::get('/verifyuser_dialysis', "DialysisController@verifyuser_dialysis");
Route::get('/verifyuser_admin_dialysis', "DialysisController@verifyuser_admin_dialysis");
Route::get('/bloodtest/table', "DialysisController@bloodtesttable");

Route::get('/prescription', "PrescriptionController@index");
Route::get('/prescription/{id}', "PrescriptionController@detail");

//dari msoftweb
Route::get('/preview','PreviewController@preview');
Route::get('/preview/data','PreviewController@previewdata');
Route::get('/localpreview','WebserviceController@localpreview');

Route::get('/previewvideo/{id}','PreviewController@previewvideo');

Route::get('/upload','PreviewController@upload');
Route::post('/upload','PreviewController@form');

Route::get('/emergency','EmergencyController@index');


Route::get('/download/{folder}/{image_path}','PreviewController@download');

//change carousel image to small thumbnail size
Route::get('/thumbnail/{folder}/{image_path}','PreviewController@thumbnail');

//appointment

Route::get('/appointment','AppointmentController@show')->name('appointment');;
Route::get('/appointment/table','AppointmentController@table');
Route::post('/appointment/form','AppointmentController@form');
Route::get('/appointment/getEvent','AppointmentController@getEvent');
Route::post('/appointment/addEvent','AppointmentController@addEvent');
Route::post('/appointment/editEvent','AppointmentController@editEvent');
Route::post('/appointment/delEvent','AppointmentController@delEvent');

//webservice luar
Route::get('/webservice/patmast','WebserviceController@patmast');
Route::get('/webservice/episode','WebserviceController@episode');
Route::get('/webservice/ticket','WebserviceController@ticket');
Route::get('/webservice/login','WebserviceController@login');
Route::get('/webservice/auto_episode','WebserviceController@auto_episode');

//util dr msoftweb
Route::get('/util/get_value_default','defaultController@get_value_default')->name('util_val');
Route::get('/util/get_table_default','defaultController@get_table_default')->name('util_tab');

//pivot
Route::get('/dashboard','eisController@dashboard')->name('dashboard');
Route::get('/store_dashb','WebserviceController@store_dashb');
Route::get('/eis','eisController@show')->name('eis');
Route::get('/reveis','eisController@reveis')->name('reveis');
Route::get('/pivot_get', "eisController@table");

//doctornote
Route::get('/doctornote','DoctornoteController@index');
Route::get('/doctornote/table','DoctornoteController@table')->name('doctornote_route');
Route::post('/doctornote/form','DoctornoteController@form');
Route::post('/doctornote_transaction_save', "DoctornoteController@transaction_save");

//case note
Route::get('/casenote','CasenoteController@index');
Route::get('/casenote/table','CasenoteController@table');
Route::post('/casenote/form','CasenoteController@form');
Route::post('/casenote_transaction_save', "CasenoteController@transaction_save");

//// Dietetic Care Notes page ///
Route::get('/dieteticCareNotes','DieteticCareNotesController@show');
Route::get('/dieteticCareNotes/table','DieteticCareNotesController@table');
Route::post('/dieteticCareNotes/form','DieteticCareNotesController@form');


//// phys Care Notes page ///
Route::get('/phys','physioController@show');
Route::get('/phys/table','physioController@table');
Route::post('/phys/form','physioController@form');

Route::get('/cardiograph','CardiographController@get_graph');
Route::get('/cardiograph/table','CardiographController@table');
Route::post('/cardiograph/form','CardiographController@form');

//// phys Care Notes page ///
Route::get('/nursing','NursingController@show');
Route::get('/nursing/table','NursingController@table');
Route::post('/nursing/form','NursingController@form');


Route::get('/mainlanding','PatmastController@mainlanding');

Route::get('/pat_mast','PatmastController@show');
Route::get('/pat_mast/get_entry','PatmastController@get_entry');
Route::get('/pat_mast/post_entry','PatmastController@post_entry');
Route::post('/pat_mast/post_entry','PatmastController@post_entry');
Route::post('/pat_mast/save_patient','PatmastController@save_patient');
Route::post('/pat_mast/save_episode','PatmastController@save_episode');
Route::post('/pat_mast/save_adm','PatmastController@save_adm');
Route::post('/pat_mast/save_gl','PatmastController@save_gl');
Route::post('/pat_mast/new_occup_form','PatmastController@new_occup_form');
Route::post('/pat_mast/new_title_form','PatmastController@new_title_form');
Route::post('/pat_mast/new_areacode_form','PatmastController@new_areacode_form');
Route::post('/pat_mast/new_relationship_form','PatmastController@new_relationship_form');
Route::post('/pat_mast/auto_save','PatmastController@auto_save');

Route::post('/discharge/form','DischargeController@form');

Route::post('/episode/save_doc','PatmastController@save_doc');
Route::post('/episode/save_bed','PatmastController@save_bed');
Route::post('/episode/save_nok','PatmastController@save_nok');
Route::post('/episode/save_emr','PatmastController@save_emr');
Route::get('/episode/get_episode_by_mrn','PatmastController@get_episode_by_mrn');
Route::get('/get_preepis_data','PatmastController@get_preepis_data');

Route::get('/mykadFP','MycardController@mykadFP');
Route::post('/mykadfp_store','MycardController@mykadfp_store');
Route::get('/get_mykad_local','MycardController@get_mykad_local');
Route::post('/save_mykad_local','MycardController@save_mykad_local');

Route::get('/preregister','PreregisterController@show');
Route::post('/prereg','PreregisterController@prereg');

Route::get('/test','testController@patmast_limit');
// Route::get('/test2','testController@test2');
// Route::get('/test3','testController@test3');

Route::get('/enquiry','enquiryController@show');
Route::get('/enquiry_order','enquiryController@show_order');
Route::get('/enquiry/table','enquiryController@table');

Route::get('/labresult','LabresultController@show');
Route::get('/labresult/table','LabresultController@table');
Route::post('/labresult','LabresultController@form');


///////////////file setup//////////////////////////////////////////////////


Route::get('/setuplanding','defaultController@setuplanding');

//// Religion setup page ///
Route::get('/religion','setup\ReligionController@show');
Route::get('/religion/table','setup\ReligionController@table');
Route::post('/religion/form','setup\ReligionController@form');

//// Race setup page ///
Route::get('/race','setup\RaceController@show');
Route::get('/race/table','setup\RaceController@table');
Route::post('/race/form','setup\RaceController@form');

//// Salutation setup page ///
Route::get('/salutation','setup\SalutationController@show');
Route::get('/salutation/table','setup\SalutationController@table');
Route::post('/salutation/form','setup\SalutationController@form');

//// relationship setup page ///
Route::get('/relationship','setup\RelationshipController@show');
Route::get('/relationship/table','setup\RelationshipController@table');
Route::post('/relationship/form','setup\RelationshipController@form');

//// billtype setup page ///
Route::get('/billtype','setup\BilltypeController@show');
Route::get('/billtype/table','setup\BilltypeController@table');
Route::post('/billtype/form','setup\BilltypeController@form');

//// marital setup page ///
Route::get('/marital','setup\MaritalController@show');
Route::get('/marital/table','setup\MaritalController@table');
Route::post('/marital/form','setup\MaritalController@form');

//// bloodgroup setup page ///
Route::get('/bloodGroup','setup\BloodGroupController@show');
Route::get('/bloodGroup/table','setup\BloodGroupController@table');
Route::post('/bloodGroup/form','setup\BloodGroupController@form');

//// citizen setup page ///
Route::get('/citizen','setup\CitizenController@show');
Route::get('/citizen/table','setup\CitizenController@table');
Route::post('/citizen/form','setup\CitizenController@form');

//// discipline setup page ///
Route::get('/discipline','setup\DisciplineController@show');
Route::get('/discipline/table','setup\DisciplineController@table');
Route::post('/discipline/form','setup\DisciplineController@form');

//// doctorStatus setup page ///
Route::get('/doctorStatus','setup\DoctorStatusController@show');
Route::get('/doctorStatus/table','setup\DoctorStatusController@table');
Route::post('/doctorStatus/form','setup\DoctorStatusController@form');

//// language setup page ///
Route::get('/language','setup\LanguageController@show');
Route::get('/language/table','setup\LanguageController@table');
Route::post('/language/form','setup\LanguageController@form');

//// Occupation setup page ///
Route::get('/occupation','setup\OccupationController@show');
Route::get('/occupation/table','setup\OccupationController@table');
Route::post('/occupation/form','setup\OccupationController@form');

//// icd setup page ///
Route::get('/icd','setup\icdController@show');
Route::get('/icd/table','setup\icdController@table');
Route::post('/icd/form','setup\icdController@form');

//// mma setup page ///
Route::get('/mma','setup\mmaController@show');
Route::get('/mma/table','setup\mmaController@table');
Route::post('/mma/form','setup\mmaController@form');
Route::post('/mmaDetail/form','setup\mmaDetailController@form');

//// mmamaintenance setup page ///
Route::get('/mmamaintenance','setup\mmamaintenanceController@show');
Route::get('/mmamaintenance/table','setup\mmamaintenanceController@table');
Route::post('/mmamaintenance/form','setup\mmamaintenanceController@form');
Route::post('/mmamaintenanceDetail/form','setup\mmamaintenanceDetailController@form');

//// speciality setup page ///
Route::get('/speciality','setup\SpecialityController@show');
Route::get('/speciality/table','setup\SpecialityController@table');
Route::post('/speciality/form','setup\SpecialityController@form');

//// Occupation setup page ///
Route::get('/area','setup\AreaController@show');
Route::get('/area/table','setup\AreaController@table');
Route::post('/area/form','setup\AreaController@form');

//// Charge master setup page ///
Route::get('/chargemaster','setup\ChargeMasterController@show');
Route::get('/chargemaster/table','setup\ChargeMasterController@table');
Route::post('/chargemaster/form','setup\ChargeMasterController@form');
Route::get('/chargemaster/form','setup\ChargeMasterController@form');
Route::get('/chargemaster/chgpricelatest','setup\ChargeMasterController@chgpricelatest');
Route::post('/chargemasterDetail/form','setup\ChargeMasterDetailController@form');

//// Charge class setup page ///
Route::get('/chargeclass','setup\ChargeClassController@show');
Route::get('/chargeclass/table','setup\ChargeClassController@table');
Route::post('/chargeclass/form','setup\ChargeClassController@form');
Route::get('/chargeclass/form','setup\ChargeClassController@form');
Route::post('/chargeclassDetail/form','setup\ChargeClassDetailController@form');

//// Charge type setup page ///
Route::get('/chargetype','setup\ChargeTypeController@show');
Route::get('/chargetype/table','setup\ChargeTypeController@table');
Route::post('/chargetype/form','setup\ChargeTypeController@form');
Route::get('/chargetype/form','setup\ChargeTypeController@form');
Route::post('/chargetypeDetail/form','setup\ChargeTypeDetailController@form');

//// Charge group setup page ///
Route::get('/chargegroup','setup\ChargeGroupController@show');
Route::get('/chargegroup/table','setup\ChargeGroupController@table');
Route::post('/chargegroup/form','setup\ChargeGroupController@form');
Route::get('/chargegroup/form','setup\ChargeGroupController@form');
Route::post('/chargegroupDetail/form','setup\ChargeGroupDetailController@form');

//// taxmast setup ///
Route::get('/taxmast','setup\TaxMastController@show');
Route::get('/taxmast/table','setup\TaxMastController@table');
Route::post('/taxmast/form','setup\TaxMastController@form');

//// Dosage setup ///
Route::get('/dosage','setup\DosageController@show');
Route::get('/dosage/table','setup\DosageController@table');
Route::post('/dosage/form','setup\DosageController@form');

//// Frequency setup ///
Route::get('/frequency','setup\FrequencyController@show');
Route::get('/frequency/table','setup\FrequencyController@table');
Route::post('/frequency/form','setup\FrequencyController@form');

//// Instruction setup ///
Route::get('/instruction','setup\InstructionController@show');
Route::get('/instruction/table','setup\InstructionController@table');
Route::post('/instruction/form','setup\InstructionController@form');

//// Compcode setup page ///
Route::get('/compcode','setup\CompcodeController@show');
Route::get('/compcode/table','setup\CompcodeController@table');
Route::post('/compcode/form','setup\CompcodeController@form');

//// Doctor setup page ///
Route::get('/doctor','setup\DoctorController@show');
Route::get('/doctor/table','setup\DoctorController@table');
Route::post('/doctor/form','setup\DoctorController@form');
Route::post('/doctorContribution/form','setup\DoctorContributionController@form');

//// receipt AR setup page ///
Route::get('/receipt','finance\ReceiptController@show');
Route::get('/receipt/table','finance\ReceiptController@table');
Route::post('/receipt/form','finance\ReceiptController@form');

//// Receipt Transaction AR - report sales ///
Route::get('/ReceiptAR_Report','finance\ReceiptAR_ReportController@show');
Route::get('/ReceiptAR_Report/table','finance\ReceiptAR_ReportController@table');
Route::post('/ReceiptAR_Report/form','finance\ReceiptAR_ReportController@form');
Route::get('/ReceiptAR_Report/showExcel','finance\ReceiptAR_ReportController@showExcel');

//// refund AR setup page ///
Route::get('/refund','finance\RefundController@show');
Route::get('/refund/table','finance\RefundController@table');
Route::post('/refund/form','finance\RefundController@form');

//// doctor_maintenance setup page ///
Route::get('/doctor_maintenance','hisdb\DoctorMaintenanceController@show');
Route::get('/doctor_maintenance/table','hisdb\DoctorMaintenanceController@table');
Route::post('/doctor_maintenance/form','hisdb\DoctorMaintenanceController@form');
Route::post('/doctor_maintenance/save_session','hisdb\DoctorMaintenanceController@save_session');
Route::post('/doctor_maintenance/save_bgleave','hisdb\DoctorMaintenanceController@save_bgleave');
Route::post('/doctor_maintenance/save_colorph','hisdb\DoctorMaintenanceController@save_colorph');

//// doctor_maintenance setup page ///
Route::get('/rsc_maintenance','hisdb\rscMaintenanceController@show');
Route::get('/rsc_maintenance/table','hisdb\rscMaintenanceController@table');
Route::post('/rsc_maintenance/form','hisdb\rscMaintenanceController@form');
Route::post('/rsc_maintenance/save_session','hisdb\rscMaintenanceController@save_session');
Route::post('/rsc_maintenance/save_bgleave','hisdb\rscMaintenanceController@save_bgleave');
Route::post('/rsc_maintenance/save_colorph','hisdb\rscMaintenanceController@save_colorph');

//// Admission Source setup page ///
Route::get('/admissrc','setup\AdmisSrcController@show');
Route::get('/admissrc/table','setup\AdmisSrcController@table');
Route::post('/admissrc/form','setup\AdmisSrcController@form');

//// Case Type setup page ///
Route::get('/casetype','setup\CaseTypeController@show');
Route::get('/casetype/table','setup\CaseTypeController@table');
Route::post('/casetype/form','setup\CaseTypeController@form');

//// Episode Type setup page ///
Route::get('/episodetype','setup\EpisodeTypeController@show');
Route::get('/episodetype/table','setup\EpisodeTypeController@table');
Route::post('/episodetype/form','setup\EpisodeTypeController@form');

//// Discharge Destination setup page ///
Route::get('/dischargedestination','setup\DischargeDestinationController@show');
Route::get('/dischargedestination/table','setup\DischargeDestinationController@table');
Route::post('/dischargedestination/form','setup\DischargeDestinationController@form');

// //// ID Type setup page ///
Route::get('/idtype','setup\IDTypeController@show');
Route::get('/idtype/table','setup\IDTypeController@table');
Route::post('/idtype/form','setup\IDTypeController@form');

// //// Address Type setup page ///
Route::get('/addresstype','setup\AddressTypeController@show');
Route::get('/addresstype/table','setup\AddressTypeController@table');
Route::post('/addresstype/form','setup\AddressTypeController@form');

//// Country setup page ///
Route::get('/country','setup\CountryController@show');
Route::get('/country/table','setup\CountryController@table');
Route::post('/country/form','setup\CountryController@form');

//// State setup page ///
Route::get('/state','setup\StateController@show');
Route::get('/state/table','setup\StateController@table');
Route::post('/state/form','setup\StateController@form');

//// Postcode setup page ///
Route::get('/postcode','setup\PostcodeController@show');
Route::get('/postcode/table','setup\PostcodeController@table');
Route::post('/postcode/form','setup\PostcodeController@form');

//// Citizen setup page ///
Route::get('/citizen','setup\CitizenController@show');
Route::get('/citizen/table','setup\CitizenController@table');
Route::post('/citizen/form','setup\CitizenController@form');

//// Ward setup page ///
Route::get('/ward','setup\WardController@show');
Route::get('/ward/table','setup\WardController@table');
Route::post('/ward/form','setup\WardController@form');

//// Bed Type setup page ///
Route::get('/bedtype','setup\BedTypeController@show');
Route::get('/bedtype/table','setup\BedTypeController@table');
Route::post('/bedtype/form','setup\BedTypeController@form');

//// Bed setup page ///
Route::get('/bed','setup\BedController@show');
Route::get('/bed/table','setup\BedController@table');
Route::post('/bed/form','setup\BedController@form');

//// Bed Management setup page ///
Route::get('/bedmanagement','setup\BedManagementController@show');
Route::get('/bedmanagement/table','setup\BedManagementController@table');
Route::post('/bedmanagement/form','setup\BedManagementController@form');
Route::get('/bedmanagement/statistic','setup\BedManagementController@statistic');