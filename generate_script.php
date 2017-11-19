<?php 
        require 'include/common.php';    
        $Rtype=$_POST['report'];
        $user_id=$_SESSION['id'];
       
        require('fpdf/fpdf.php');
        class PDF_reciept extends FPDF {
	function __construct ($orientation = 'P', $unit = 'pt', $format = 'Letter', $margin = 40) {
		$this->FPDF($orientation, $unit, $format);
		$this->SetTopMargin($margin);
		$this->SetLeftMargin($margin);
		$this->SetRightMargin($margin);
		
		$this->SetAutoPageBreak(true, $margin);
	}
	
	function Header () {
		$this->SetFont('Arial', 'B', 20);
		$this->SetFillColor(36, 96, 84);
		$this->SetTextColor(225);
		$this->Cell(0, 30, "GEU BIDDING SYSTEM", 0, 1, 'C', true);
	}
	
	function Footer () {
		$this->SetFont('Arial', '', 12);
		$this->SetTextColor(0);
		$this->SetXY(40, -60);
		$this->Cell(0, 20, "Thank you for Visiting Geu Bidding System", 'T', 0, 'C');
	}
}
    $pdf = new PDF_reciept();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->SetY(100);

        if($Rtype=='Item Sold')
        {
            if(!empty($_POST['startdate']) && !empty($_POST['lastdate']))
            {
                 $starttime=$_POST['startdate'];
                 $endtime=$_POST['lastdate'];
                $query="select item_id,item_name,buyer_id,max_price from items where seller_id='$user_id' and start_time > '$starttime' and start_time < '$endtime' and buyer_id != NULL";
            }
            else
            {
                $query="select item_id,item_name,buyer_id,max_price from items where seller_id='$user_id' and buyer_id != NULL";
            }
            $result= mysqli_query($con, $query);
            if(mysqli_num_rows($result)==0)
            {
                $pdf->Cell(0,15,"No item Sold\n\n");
            }   
            else
            {
                $pdf->SetFont('Arial', 'B', 12);
                $pdf->SetTextColor(0);
                $pdf->SetFillColor(36, 140, 129);
                $pdf->SetLineWidth(1);
                $pdf->Cell(227, 25, "Item Id", 'LTR', 0, 'C', true);
                $pdf->Cell(100, 25, "Buyer Name", 'LTR', 1, 'C', true);
                $pdf->Cell(100,25,"Bid Price",'LTR',1,'C',true);
                $pdf->SetFont('Arial', '');
                $pdf->SetFillColor(238);
                $pdf->SetLineWidth(0.2);
                $fill = false;
                while($fetch= mysqli_fetch_array($result))
                {
                    $uid=$fetch['buyer_id'];
                    $query2="select user_name from users where user_id=$uid";
                    $result2= mysqli_query($con, $query2);
                    $fetch2= mysqli_fetch_array($result2);
                    $pdf->Cell(227, 20,$fetch['item_id'], 1, 0, 'L', $fill);
                    $pdf->Cell(100, 20,$fetch2['user_name'] , 1, 1, 'R', $fill);
                    $pdf->cell(100,20,$fetch['max_price'],1,1,'R',$fill);
                    $fill = !$fill;
                }
                
            }
        }
        else if($Rtype=='Item Bought')
        {
            $query;
           if(!empty($_POST['startdate']) && !empty($_POST['lastdate']))
          {
                  $starttime=$_POST['startdate'];
                 $endtime=$_POST['lastdate'];
              
             $query="select item_id,item_name,seller_id,max_price from items where buyer_id='$user_id' and start_time > '$starttime' and start_time < '$endtime' ";
          }
          else
            {
                $query="select item_id,item_name,seller_id,max_price from items where buyer_id='$user_id' ";
            }
            $result= mysqli_query($con, $query) or die();
            if(mysqli_num_rows($result)==0)
            {
                $pdf->Cell(0,15,"No item Bought");
            }   
            else
            {
                $pdf->SetFont('Arial', 'B', 12);
                $pdf->SetTextColor(0);
                $pdf->SetFillColor(36, 140, 129);
                $pdf->SetLineWidth(1);
                $pdf->Cell(127, 25, "Item Id", 'LTR', 0, 'C', true);
                $pdf->Cell(100, 25, "Item Name", 'LTR', 0, 'C', true);
                $pdf->Cell(100, 25, "Seller Name", 'LTR', 0, 'C', true);
                $pdf->Cell(100,25,"Bid Price",'LTR',1,'C',true);
                $pdf->SetFont('Arial', '');
                $pdf->SetFillColor(238);
                $pdf->SetLineWidth(0.2);
                $fill = false;
                while($fetch= mysqli_fetch_array($result))
                {
                    $uid=$fetch['seller_id'];
                    $query2="select user_name from users where user_id=$uid";
                    $result2= mysqli_query($con, $query2);
                    $fetch2= mysqli_fetch_array($result2);
                    $pdf->Cell(127, 20,$fetch['item_id'], 1, 0, 'L', $fill);
                    $pdf->Cell(100, 20,$fetch['item_name'] , 1, 0, 'R', $fill);
                    $pdf->Cell(100, 20,$fetch2['user_name'] , 1, 0, 'R', $fill);
                    $pdf->cell(100,20,$fetch['max_price'],1,1,'R',$fill);
                    $fill = !$fill;
                }
                
            }
            
        }
        else
        {
            $query="select item_id,item_name,seller_id,null as buyer_id,start_time from items where seller_id='$user_id' UNION SELECT items.item_id ,item_name,null as seller_id,user_id,bid_time from bid_table,items where bid_table.item_id=items.item_id and user_id='$user_id' order by start_time ";
            $result= mysqli_query($con, $query) or die();
            if(mysqli_num_rows($result)==0)
            {
                $pdf->Cell(0,15,"No History");
            }   
            else
            {
                $pdf->SetFont('Arial', 'B', 12);
                $pdf->SetTextColor(0);
                $pdf->SetFillColor(36, 140, 129);
                $pdf->SetLineWidth(1);
                $pdf->Cell(120, 25, "Item Id", 'LTR', 0, 'C', true);
                $pdf->Cell(100, 25, "Item Name", 'LTR', 0, 'C', true);
                $pdf->Cell(100, 25, "Your Role", 'LTR', 0, 'C', true);
                $pdf->Cell(120,25,"Time of action",'LTR',1,'C',true);
                $pdf->SetFont('Arial', '');
                $pdf->SetFillColor(238);
                $pdf->SetLineWidth(0.2);
                $fill = false;
                while($fetch= mysqli_fetch_array($result))
                {
                    $role;
                    if($fetch['seller_id']==NULL)
                    {
                        $role='BIDDER';
                    }
                    else if($fetch['buyer_id']==NULL)
                    {
                        $role='SELLER';
                    }
                        
                    $pdf->Cell(120, 20,$fetch['item_id'], 1, 0, 'L', $fill);
                    $pdf->Cell(100, 20,$fetch['item_name'] , 1, 0, 'R', $fill);
                    $pdf->Cell(100, 20,$role , 1, 0, 'R', $fill);
                    $pdf->cell(120,20,$fetch['start_time'],1,1,'R',$fill);
                    $fill = !$fill;
                }
                
            }
        }

$pdf->Output('report.pdf', 'D');


?> 
                