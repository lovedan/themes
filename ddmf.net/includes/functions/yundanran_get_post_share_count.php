<?php 
/*
    统计文章分享次数
*/
function yundanran_get_post_share_count($postID)
{
    $count_key = 'yundanran_post_share_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count=='' || !$count)
    {
        // delete_post_meta($postID, $count_key);
        // add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}
function yundanran_set_post_share_count()
{
    if($_POST['action'] == 'yundanran_share')
    {
        $postID=$_POST['post_id'];
        if($postID)
        {
            $count_key = 'yundanran_post_share_count';
            $count = get_post_meta($postID, $count_key, true);
            if($count=='' || !$count)
            {
                $count = 1;
                delete_post_meta($postID, $count_key);
                add_post_meta($postID, $count_key, $count);
            }
            else
            {
                $count++;
                update_post_meta($postID, $count_key, $count);
            }
 
            $json['data']=1;
            $json['info']=$count;
        }
        else
        {
            $json['data']=-1;
            $json['info']='参数缺失';
        }
 
        header("Content-Type: application/json");
        echo json_encode($json);
        exit;
 
    }
}
add_action('template_redirect','yundanran_set_post_share_count');
function yundanran_count_share()
{
    global $wpdb;
    $count=0;
    $views= $wpdb->get_results("SELECT * FROM $wpdb->postmeta WHERE meta_key='yundanran_post_share_count'");  
//所有分享次数
    foreach($views as $key=>$value)
    {
        $meta_value=$value->meta_value;
        if($meta_value!='')
        {
            $count+=(int)$meta_value;
        }
    }
    return $count;
}
?>