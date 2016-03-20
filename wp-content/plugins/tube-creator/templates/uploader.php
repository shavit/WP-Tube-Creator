<?php
    /**
     * 
     *  The CSV Format
     * 
     * 0. 
     * 1. URL
     * 2. Categories
     * 3. Rating
     * 4. Username
     * 5. Title
     * 6. Tags
     * 7. Views
     * 8. Pornstars
     * 9. Thumbnail
     * 10. Filpbook
     * 
     */
     
    if (isset($_POST['wpTubeCreatorForm'])){
        
        if (isset($_POST['wpTubeCreatorForm']['videosFileURL'])){
            $csvFileURL = $_POST['wpTubeCreatorForm']['videosFileURL'];
            $fileContents = file_get_contents($csvFileURL);
        }
        // if isset($_POST['wpTubeCreatorForm']['videosFile'])){
        //     $csvFileURL = $_POST['wpTubeCreatorForm']['videosFileURL'];
        //     $fileContents = file_get_contents($csvFileURL);
        // }
        
        // parse the csv file
        $lines = explode(PHP_EOL, $fileContents);
        $csvArray = array();
        foreach ($lines as $line) {
            $csvArray[] = str_getcsv($line, '|');
        }
        
        echo '<pre>';
        print_r($csvArray[0]);
        echo '</pre>';
        
        // create post
        foreach ($csvArray as $csvItem){
            
            // if therethe content is not empty
            if (isset($csvItem[0])){
                $res = wp_insert_post(array(
                    'post_status' => 'publish',
                    'post_type' => 'video',
                    'post_content' => $csvItem[0],
                    'post_title' => wp_strip_all_tags($csvItem[5]),
                ), $wp_error);
                
                if (isset($wp_error)){
                    // catch errors
                    echo '<pre>';
                    print_r($wp_error);
                    echo '</pre>';
                }
            }
            
        }
    }
?>

<h1>Load Videos</h1>
<form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post" enctype="multipart/form-data">
    <fieldset>
        <div class="control-group">
            <label for="videosFileURL">Choose A File From URL:</label>
            <div class="control">
                <input type="url" id="videosFileURL" name="wpTubeCreatorForm[videosFileURL]" />
            </div>
        <div class="control-group">
            <label for="videosFile">Upload A File</label>
            <div class="control">
                <input type="file" id="videosFile" name="wpTubeCreatorForm[videosFile]" />
            </div>
        </div>
    </fieldset>
    <div class="actions">
        <input type="submit" value="Send"/>
    </div>
</form>

