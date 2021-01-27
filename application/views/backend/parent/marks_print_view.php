<?php
	$class_name		 	= 	$this->db->get_where('class' , array('class_id' => $class_id))->row()->name;
	$exam_name  		= 	$this->db->get_where('exam' , array('exam_id' => $exam_id))->row()->name;
	$system_name        =	$this->db->get_where('settings' , array('type'=>'system_name'))->row()->description;
    $running_year       =   $this->db->get_where('settings' , array('type'=>'running_year'))->row()->description;
?>
<div id="print">
	<script src="assets/js/jquery-1.11.0.min.js"></script>
	<style type="text/css">
		td {padding: 5px;}
	</style>
        <div align="right"><img src="uploads/logo.png" style="max-height : 60px;"></div>   
    <h3 style="font-weight: 100;"><?php echo $system_name;?></h3>
        <?php echo $this->db->get_where('student' , array('student_id' => $student_id))->row()->name;?><br>
        <?php echo $class_name;?><br>
        <?php echo $exam_name;?>

	<table style="width:100%; border-collapse:collapse;border: 1px solid #ccc; margin-top: 10px;" border="1">
       <thead>
        <tr>
            <td style="text-align: center;"><?php echo get_phrase('Subject');?></td>
            <td style="text-align: center;"><?php echo get_phrase('Total-Marks');?></td>
            <td style="text-align: center;"><?php echo get_phrase('Final-Exam');?></td>
            <td style="text-align: center;"><?php echo get_phrase('Total');?></td>
        </tr>
    </thead>
    <tbody>
        <?php 
            $total_marks = 0;
            $total_grade_point = 0;
            $subjects = $this->db->get_where('subject' , array(
                    'class_id' => $class_id , 'year' => $running_year
            ))->result_array();
            foreach ($subjects as $row3):
        ?>
            <tr>
                <td style="text-align: center;"><?php echo $row3['name'];?></td>
                <td style="text-align: center;">
                    <?php $obtained_mark_query = $this->db->get_where('mark' , array(
                                                    'subject_id' => $row3['subject_id'],
                                                        'exam_id' => $exam_id,
                                                            'class_id' => $class_id,
                                                                'student_id' => $student_id , 
                                                                    'year' => $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description
                                                ));
                        if($obtained_mark_query->num_rows() > 0)
                        {
                            $marks = $obtained_mark_query->result_array();
                            foreach ($marks as $row4) 
                            {
                             echo $row4['mark_obtained']+$row4['labuno']+$row4['labdos']+$row4['labtres']
                                 +$row4['labcuatro']+$row4['labcinco']+$row4['labseis']+$row4['labsiete']+$row4['labocho']+$row4['labnueve'];
                            }
                        }
                    ?>
                </td>
                <td style="text-align: center;"><?php echo $row4['final']; ?></td>
                <td style="text-align: center;"><?php echo $row4['labtotal']; ?></td>
            </tr>
        <?php endforeach;?>
    </tbody>
   </table>
</div>

<script type="text/javascript">
	jQuery(document).ready(function($)
	{
		var elem = $('#print');
		PrintElem(elem);
		Popup(data);
	});
    function PrintElem(elem)
    {
        Popup($(elem).html());
    }
    function Popup(data) 
    {
        var mywindow = window.open('', 'my div', 'height=400,width=600');
        mywindow.document.write('<html><head><title></title>');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');
        mywindow.document.close();
        mywindow.focus();
        mywindow.print();
        mywindow.close();
        return true;
    }
</script>