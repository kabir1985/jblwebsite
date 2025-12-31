<!DOCTYPE html>
<html>
<head>
    <title><?php echo  $title; ?></title>
</head>

<body>
    <?php echo "<span style='color:#FF0000;font-size:15px;font-family:Helvetica;'>Searched Result for:</span> <span style='color:#0099cc;font-weight:bold;font-size:15px;font-family:Helvetica;'>$title</span>"; ?>
     <?php echo '<br><br><br>'; ?>
  <?php
$word = "about_us";
$word = "products";
$word = "services";
$word = "international_trade";
$word = "treasury_and_capital";
$word = "contact_us";
if(!empty($results))
{
    $row_count=0;
foreach ($results as $row)
 {
    $row_count++;
   
    if (strpos($row->url, $word) !== false)
    {
        echo "<td>$row_count.&nbsp;<a target='_blank' href=".base_url()."$row->url><span class='highlight_word'>".$row->name."</span></a></td></br>";
        //echo "".base_url()."$row->url</br></br>";
        echo "<div style='border-bottom: 1px solid #cecece'></div></br>";
    }
    elseif (($row->url) != $word and (substr($row->url, 0, 4) != "http"))
    {
        echo "<td>$row_count.&nbsp;<a target='_blank' href=". base_url()."$row->url>".$row->name."</a></td></br>";
        //echo "". base_url()."$row->url</br></br>";  
        echo "<div style='border-bottom: 1px solid #cecece'></div></br>";
    }
    elseif (substr($row->url, 0, 4) === "http")
    {     
        echo "<td>$row_count.&nbsp;<a target='_blank' href=$row->url>".$row->name. "</a></td></br>";
       //echo "$row->url</br></br>";
        echo "<div style='border-bottom: 1px solid #cecece'></div></br>";
    }
    else
    {
        echo 'Sorry No Match';
    }
 }
}
else
    {
    echo 'No data matches';
    }

