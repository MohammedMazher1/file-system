<?php 
    $newRoot = '';
    $currnentPath = '';
    $sendRoot= $_GET['root']??'';
    $sendfile= $_GET['file']??'';
    if($sendRoot != '' && $sendfile != ''){
        $newRoot = $sendRoot.'/'.$sendfile;
        $currnentPath = $sendRoot.'<'.$sendfile;
    }
    $root = ($newRoot) != ''?$newRoot:'folder-1' ;
    $dir = dir($root);
    if(isset($_POST['fileName'])){
        $text = $_POST['fileName'];
        $folderPath = $root.'/'.$text;
        $arr=explode('.',$text);
        if(count($arr)>1){
            fopen($folderPath,'w');
            // fclose($)
        }else{
            if(!is_dir($folderPath))
            mkdir($folderPath,0777,true);
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/style.css">
    <link rel="stylesheet" href="Css/all.min.css">
    <link rel="stylesheet" href="Css/normalize.css">
    <title>folders</title>
</head>
<body>
    <header>

        <nav>
            <div class="container">
                <div>
                    <span class="fa-solid fa-bars"></span>
                    <h1>file</h1>
                </div>
                <div class="createDiv">
                    <span class="fa fa-plus"></span>
                    <span class="fa fa-search"></span>
                    <div class="createFolder" id="forhover">
                        <form action="" method="POST">
                            <table>
                                <tr><td><span>file Name</span></td></tr>
                                <tr><td><input type="text" name="fileName" id="createElement"></td></tr>
                                <tr><td><input type="submit" id="submit" value="create"></td></tr>
                            </table>
                        </form>
                        
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container">
                <section class="folders">
                    <?php 
                    while($file = $dir -> read()){ 
                        if(is_dir($root.'/'.$file) == true)
                        {    
                        ?> 

                        <div>
                            <a href='<?php echo '/foldersSystem/?root='.$root.'&file='.$file?>' ><span class="fa fa-folder icon"></span></a>
                            <span class="title"><?php echo $file ?></span>
                        </div>
                        <?php } else { ?>   
                            <div>
                            <a href='<?php echo '/foldersSystem/?root='.$root.'&file='.$file?>'><span class="fa fa-file icon"></span></a>
                            <span class="title"><?php echo $file ?></span>
                            </div>      
                        <?php } ?>
                        <?php } ?>
                        
                    <!-- <div>
                        <span class="fa fa-folder"></span>
                        <span>title</span>
                    </div>
                    <div>
                        <span class="fa fa-folder"></span>
                        <span>title</span>
                    </div>
                    <div>
                        <span class="fa fa-folder"></span>
                        <span>title</span>
                    </div> -->
            </section>
            </div>
    </main>
    <script>
        const icon = document.getElementsByClassName('fa-plus')[0];;
        icon.addEventListener('click',function(){
            document.getElementById('forhover').style.display='flex';
        })
        icon.addEventListener('dblclick',function(){
            document.getElementById('forhover').style.display='none';
        })
    </script>
</body>
</html>