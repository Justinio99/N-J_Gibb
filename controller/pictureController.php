<?php
require_once '../repository/UserRepository.php';

require_once '../repository/PictureRepository.php';

class PictureController

	{
<<<<<<< HEAD
	 

	function pictures()
=======
	public function pictures()
>>>>>>> dev_tags
		{
		error_reporting($gid = $_GET['gid']);
		$searchStr = $_POST['searchTag'];
		$view = new View('pictures');
		$view->title = 'User Pictures';
		$view->heading = 'User Pictures';
		$pictureRepo = new PictureRepository();
		if($_POST['searchTag'] != ''){
		if(isset($_POST['searchTag'])){

			$tagRepo = new TagRepository();
			$tagsOrderd = $tagRepo->selectTag($searchStr);
			$tagByTid = $tagRepo->getPid($tagsOrderd->tid);
		
			$testarray = array();
			
			for($x =0; $x < count($tagByTid); $x++){
				$fotoTags = $pictureRepo->getPicturesByIds($gid,$tagByTid[$x]->pid);
				array_push($testarray, $fotoTags);
			}
			$view->pictures =$testarray;
		}
		}else{
	
		$test = array();
		$justin = $pictureRepo->getPicturesByGid($gid);
		array_push($test,$justin);
		
		$view->pictures = $test;
		}

		$view->display();
		}


	

	public function displayUploadeErorrs($errorsPicture)
		{
		$_SESSION['registerErrors'] = $errorsPicture;
        }
    
    public function editPicture(){
        $pid = $_GET['pid'];
        $gid = $_GET['gid'];
		$view = new View('editPicture');
		$view->title = 'Edit Pictures';
        $view->heading = 'Edit Pictures';
        $view->gid = $_GET['gid'];
		$pictureRepo = new PictureRepository();
		$view->picture = $pictureRepo->getPictureByPid($pid);
		$view->display();
    }
    public function updatePicture(){
        $pid = $_GET['pid'];
        $gid = $_GET['gid'];
        $pictureRepo = new PictureRepository();
        $titel = $_POST['titel'];
        $beschrib = $_POST['beschrieb'];
        $pictureRepo->updatePicture($titel,$beschrib,$pid);
        $pfad = $GLOBALS['appurl'] . "/galleries/index";
        header('Location: ' . $pfad);
    }

    public function deletePicture(){
        $pictureRepo = new PictureRepository();
        $pid = $_GET['pid'];
        $gid = $_GET['gid'];
        
        $singlePic = $pictureRepo->getPictureByPid($pid);
        unlink("../thumbs/".$singlePic->picture);
        unlink("../Pictures/".$singlePic->picture);
        var_dump($singlePic->picture);
        $pictureRepo->deletePicture($pid);
        $pfad = $GLOBALS['appurl'] . "/picture/pictures?gid=" . $gid;
        header('Location: ' . $pfad);

    }

	public function upload()
		{
		$pictureRepo = new PictureRepository();
		$gid = $_GET['gid'];
		$uid = $_SESSION['uid'];
		$inputs = htmlspecialchars($_POST['tags']);
		$errorsRegister = [];
		$errorsPicture = [];
		if ($_POST['submit'])
			{
			if (!empty($_FILES['upload']['name']))
				{
				$title = htmlspecialchars($_POST['titel']);
				$beschreibung = htmlspecialchars($_POST['beschreibung']);
				$file_name = $_FILES['upload']['name'];
				$file_type = $_FILES['upload']['type'];
				$file_name_tmp = $_FILES['upload']['tmp_name'];
				$file_size = $_FILES['upload']['size'];
				$target_dir = "../Pictures/";

				// $randomName = bin2hex(random_bytes(10));
				// New

				$pid = $pictureRepo->maxId()->pid + 1;
				$path_parts = pathinfo($file_name);
				$newFileName = $path_parts['filename'] . strval($gid) . strval($pid) . '.' . $path_parts['extension'];

				// $newFileName = $path_parts['filename'].$randomName.'.'.$path_parts['extension'];

				$filesize = round($file_size / 1024 / 1024, 1);
					{
					$this->displayUploadeErorrs($errorsRegister);
					$pfad = $GLOBALS['appurl'] . "/picture/pictures?gid=" . $gid;
					header('Location: ' . $pfad);
					}
				  else
					{
					if (move_uploaded_file($file_name_tmp, $target_dir . $newFileName))
						{
						$img = imagecreatefromjpeg("../Pictures/" . $newFileName);
						$width = 200;
						$height = 200;
						$TNimageWidth = $width;
						$TNimageHeight = $height;
						$imagesx = imagesx($img);
						$imagesy = imagesy($img);
						if ($height > $imagesy && $width > $imagesx)
							{
							$width = $imagesx;
							$height = $imagesy;
							}

						if ($imagesx / $imagesy >= $TNimageWidth / $TNimageHeight)
							{
							$height = round(($width / $imagesx) * $imagesy);
							}
						  else
							{
							$width = round(($height / $imagesy) * $imagesx);
							}

						$thumbnail = imagecreatetruecolor($TNimageWidth, $TNimageHeight);
						imagecopyresampled($thumbnail, $img, 0, 0, 0, 0, $width, $height, $imagesx, $imagesy);
						imagejpeg($thumbnail, "../thumbs/" . $newFileName);
						imagedestroy($thumbnail);
						imagedestroy($img);
						$pictureRepo->uploadPicture($pid, $gid, $newFileName, $title, $beschreibung);
						$pfad = $GLOBALS['appurl'] . "/picture/pictures?gid=" . $gid;
						header('Location: ' . $pfad);
						}
					}
				}
			  else
				{
				array_push($errorsRegister, 'Kein Bild ausgewählt');
				$this->displayUploadeErorrs($errorsRegister);
				$pfad = $GLOBALS['appurl'] . "/picture/pictures?gid=" . $gid;
				header('Location: ' . $pfad);
				}
			}
		}
    
    
    }
