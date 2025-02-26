<?php

require_once("Pms/Form.php");

class Application_Form_MdkSchne extends Pms_Form{

	public function insertMdkSchne($post, $ipid = ''){
		$logininfo= new Zend_Session_Namespace('Login_Info');
		$clientid = $logininfo->clientid;
		$userid = $logininfo->userid;
			
		$decid = Pms_Uuid::decrypt($_GET['id']);
		$ipid = Pms_CommonData::getIpid($decid);


		$stmb = new MdkSchne();
		$stmb->ipid = $ipid;
		$pflegeversicherung  = implode(",",$post['pflegeversicherung']);
		$stmb->pflegeversicherung  = $pflegeversicherung;
		$stmb->cntpers1 = $post['cntpers1'];
		$stmb->cntpers2 = $post['cntpers2'];
		$stmb->pflegeperson = $post['pflegeperson'];
		$stmb->pflege_benefits = $post['pflege_benefits'];
		$stmb->maindiagnosis = $post['maindiagnosis'];
		$stmb->ambulante  = join(",",$post['ambulante']);
		$stmb->kurative = $post['kurative'];
		$stmb->behandlungsansatz = $post['behandlungsansatz'];
		$stmb->aufklarung = $post['aufklarung'];
		$stmb->livingwill = $post['livingwill'];
		$stmb->livingwill_wird = $post['livingwill_wird'];
		$stmb->livingwill_txt = $post['livingwill_txt'];
		$stmb->palliativer = $post['palliativer'];
		$stmb->palliativer_wird = $post['livingwill_wird'];
		$stmb->palliativer_txt = $post['palliativer_txt'];
		$stmb->erfolgen = $post['erfolgen'];
		$stmb->erfolgen_txt = $post['erfolgen_txt'];
		$stmb->schem_symptomatik = $post['schem_symptomatik'];
		$stmb->extreme_symptome = join(",",$post['extreme_symptome']);
		$stmb->extreme_symptome_txt = $post['extreme_symptome_txt'];
		$stmb->psychosoziale_a = $post['psychosoziale_a'];
		$stmb->psychosoziale_a_txt = $post['psychosoziale_a_txt'];
		$stmb->psychosoziale_b = $post['psychosoziale_b'];
		$stmb->psychosoziale_b_txt = $post['psychosoziale_b_txt'];
		$stmb->psychosoziale_c = $post['psychosoziale_c'];
		$stmb->psychosoziale_c_txt = $post['psychosoziale_c_txt'];
		$stmb->angehorige = $post['angehorige'];
		$stmb->angehorige_txt = $post['angehorige_txt'];
		$stmb->krakenpflege  = $post['krakenpflege'];
		$stmb->krakenpflege_txt  = $post['krakenpflege_txt'];
		$stmb->liegen_sapv  = $post['liegen_sapv'];
		$stmb->liegen_sapv_txt  = $post['liegen_sapv_txt'];
		$stmb->medizinische_txt  = $post['medizinische_txt'];
		$stmb->weitere  = $post['weitere'];
		$stmb->weitere_txt  = $post['weitere_txt'];
		$stmb->sonstiges  = $post['sonstiges'];
		$stmb->new_instance  = '1';
		$stmb->save();

		$result = $stmb->id;

		$cust = new PatientCourse();
		$cust->ipid = $ipid;
		$cust->course_date = date("Y-m-d H:i:s", time());
		$cust->course_type = Pms_CommonData::aesEncrypt("K");
		$cust->course_title = Pms_CommonData::aesEncrypt("MDK Schnellbegutachtung hinzugefügt.");
		$cust->recordid = $result;
		$cust->tabname = Pms_CommonData::aesEncrypt("MdkSchne_form");
		$cust->user_id = $userid;
		$cust->save();

		if($result > 0){
			return true;
		}else{
			return false;
		}
	}


	public function UpdateMdkSchne($post)
	{
		$logininfo= new Zend_Session_Namespace('Login_Info');
		$clientid = $logininfo->clientid;
		$userid = $logininfo->userid;
			
		$decid = Pms_Uuid::decrypt($_GET['id']);
		$ipid = Pms_CommonData::getIpid($decid);
			
		$stmb = Doctrine::getTable('MdkSchne')->find($post['mdk_id']);
		$pflegeversicherung  = implode(",",$post['pflegeversicherung']);
		$stmb->pflegeversicherung  = $pflegeversicherung;
		$stmb->cntpers1 = $post['cntpers1'];
		$stmb->cntpers2 = $post['cntpers2'];
		$stmb->pflegeperson = $post['pflegeperson'];
		$stmb->pflege_benefits = $post['pflege_benefits'];
		$stmb->maindiagnosis = $post['maindiagnosis'];
		$stmb->ambulante  = join(",",$post['ambulante']);
		$stmb->kurative = $post['kurative'];
		$stmb->behandlungsansatz = $post['behandlungsansatz'];
		$stmb->aufklarung = $post['aufklarung'];
		$stmb->livingwill = $post['livingwill'];
		$stmb->livingwill_wird = $post['livingwill_wird'];
		$stmb->livingwill_txt = $post['livingwill_txt'];
		$stmb->palliativer = $post['palliativer'];
		$stmb->palliativer_wird = $post['livingwill_wird'];
		$stmb->palliativer_txt = $post['palliativer_txt'];
		$stmb->erfolgen = $post['erfolgen'];
		$stmb->erfolgen_txt = $post['erfolgen_txt'];
		$stmb->schem_symptomatik = $post['schem_symptomatik'];
		$stmb->extreme_symptome = join(",",$post['extreme_symptome']);
		$stmb->extreme_symptome_txt = $post['extreme_symptome_txt'];
		$stmb->psychosoziale_a = $post['psychosoziale_a'];
		$stmb->psychosoziale_a_txt = $post['psychosoziale_a_txt'];
		$stmb->psychosoziale_b = $post['psychosoziale_b'];
		$stmb->psychosoziale_b_txt = $post['psychosoziale_b_txt'];
		$stmb->psychosoziale_c = $post['psychosoziale_c'];
		$stmb->psychosoziale_c_txt = $post['psychosoziale_c_txt'];
		$stmb->angehorige = $post['angehorige'];
		$stmb->angehorige_txt = $post['angehorige_txt'];
		$stmb->krakenpflege  = $post['krakenpflege'];
		$stmb->krakenpflege_txt  = $post['krakenpflege_txt'];
		$stmb->liegen_sapv  = $post['liegen_sapv'];
		$stmb->liegen_sapv_txt  = $post['liegen_sapv_txt'];
		$stmb->medizinische_txt  = $post['medizinische_txt'];
		$stmb->weitere  = $post['weitere'];
		$stmb->weitere_txt  = $post['weitere_txt'];
		$stmb->sonstiges  = $post['sonstiges'];
		$stmb->save();

		$cust = new PatientCourse();
		$cust->ipid = $ipid;
		$cust->course_date = date("Y-m-d H:i:s",time());
		$cust->course_type=Pms_CommonData::aesEncrypt("K");
		$cust->course_title=Pms_CommonData::aesEncrypt("MDK Schnellbegutachtung  wurde editiert");
		$cust->recordid = $post['mdk_id'];
		$cust->tabname = Pms_CommonData::aesEncrypt("MdkSchne_form");
		$cust->user_id = $userid;
		$cust->save();
	}

	public function NewInstanceMdkSchne()
	{
		$logininfo= new Zend_Session_Namespace('Login_Info');
		$clientid = $logininfo->clientid;
		$userid = $logininfo->userid;
			
		$decid = Pms_Uuid::decrypt($_GET['id']);
		$ipid = Pms_CommonData::getIpid($decid);

		$drop = Doctrine_Query::create()
		->update('MdkSchne')
		->set("new_instance",'0')
		->where("ipid LIKE '" . $ipid . "'");

		$drop->execute();


	}
}

?>