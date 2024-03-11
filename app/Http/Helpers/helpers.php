<?php 
	
	use App\Models\Navigation;
	use App\Models\Log;
	use App\Models\Permission;
	use App\Models\Feature;
	use App\Models\Event;
	use App\Models\FeaturePermission;
	
    function getIpInfo()
    {
        $ip = $_SERVER["REMOTE_ADDR"];
    
        //Deep detect ip
        if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP)){
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP)){
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
    
    
        return $ip;
    }

    function macInfo()
    {
        
       //return substr(exec('getmac'), 0, 17);
	   return 'CC-6B-1E-42-C4-8D'; 
    }

	function osBrowser(){
		
		$userAgent = $_SERVER['HTTP_USER_AGENT'];
		$osPlatform = "Unknown OS Platform";
		$osArray = array(
			'/windows nt 10/i' => 'Windows 10',
			'/windows nt 6.3/i' => 'Windows 8.1',
			'/windows nt 6.2/i' => 'Windows 8',
			'/windows nt 6.1/i' => 'Windows 7',
			'/windows nt 6.0/i' => 'Windows Vista',
			'/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
			'/windows nt 5.1/i' => 'Windows XP',
			'/windows xp/i' => 'Windows XP',
			'/windows nt 5.0/i' => 'Windows 2000',
			'/windows me/i' => 'Windows ME',
			'/win98/i' => 'Windows 98',
			'/win95/i' => 'Windows 95',
			'/win16/i' => 'Windows 3.11',
			'/macintosh|mac os x/i' => 'Mac OS X',
			'/mac_powerpc/i' => 'Mac OS 9',
			'/linux/i' => 'Linux',
			'/ubuntu/i' => 'Ubuntu',
			'/iphone/i' => 'iPhone',
			'/ipod/i' => 'iPod',
			'/ipad/i' => 'iPad',
			'/android/i' => 'Android',
			'/blackberry/i' => 'BlackBerry',
			'/webos/i' => 'Mobile'
		);
		foreach ($osArray as $regex => $value) {
			if (preg_match($regex, $userAgent)) {
				$osPlatform = $value;
			}
		}
		$browser = "Unknown Browser";
		$browserArray = array(
			'/msie/i' => 'Internet Explorer',
			'/firefox/i' => 'Firefox',
			'/safari/i' => 'Safari',
			'/chrome/i' => 'Chrome',
			'/edge/i' => 'Edge',
			'/opera/i' => 'Opera',
			'/netscape/i' => 'Netscape',
			'/maxthon/i' => 'Maxthon',
			'/konqueror/i' => 'Konqueror',
			'/mobile/i' => 'Handheld Browser'
		);
		foreach ($browserArray as $regex => $value) {
			if (preg_match($regex, $userAgent)) {
				$browser = $value;
			}
		}

		$data['os_platform'] = $osPlatform;
		$data['browser'] = $browser;

		return $data;
	}
	
	function getPaginate($paginate = 10){
		return $paginate;
	}

	function paginateLinks($data, $design = 'layout.paginate'){
		return $data->appends(request()->all())->links($design);
	}
	
	function navigationParent($id)
    {
        $Navigation = Navigation::where('id', $id)->first();
		return $Navigation->name;
    }
	
	function getParentnav(){
		
		$navigations = Navigation::where("parent", 0)->orderBy('order', 'asc')->get();
		return $navigations;
	}
	function childNavCount($id){
		
		
		$navigations = Navigation::where('parent',$id)->orderBy('order', 'asc')->get();
		return $navigations->count();
	}
	
	function childNavshow($href,$id){
		
		
		$navigations = Navigation::where('href',$href)->where('parent', $id)->orderBy('order', 'asc')->get();
		return $navigations->count();
	}
	
	function getchildnav($id){
		
		$navigations = Navigation::where('parent',$id)->orderBy('order', 'asc')->get();
		return $navigations;
	}
	
	
	function showNav($href,$id){
		
		
		
		$navigations = Navigation::where("href", $href)->where('parent', $id)->orderBy('order', 'asc')->get();
		return $navigations->count();
	}
	
	function showNavName($href){
		$Navigation = Navigation::where('href', $href)->first();
		if(!empty($Navigation->href)){
			return $Navigation->href;
		}else{
			return '0';
		}
		
	}
	
	function getPermission($navigation,$role){
		$permission = Permission::where('navigation_id',$navigation)->where('role_id', $role)->first();
		return $permission;
	}
	
	function ActivityLogs(){
		
	}
	function getmoduleselected($id,$option){
		
		if($id == $option){
			return 'selected';
		}else{
			return ' ';
		}
	}
	
	 function getparentfeatures($id){
		$Feature = Feature::where("module", $id)->where("submodule", 0)->get();
		return $Feature;
	}
	function getsubfeatures($id,$cid){
		$Feature = Feature::where("module", $id)->where("submodule", $cid)->get();
		return $Feature;
	}
	
	function getAllevents(){
		
		$events      =  Event::orderBy('id', 'ASC')->get();
		return $events;
	}
	
	function getfeauturePermission($navigation,$role){
		$permission = FeaturePermission::where('navigation_id',$navigation)->where('role_id', $role)->first();
		return $permission;
	}
?>