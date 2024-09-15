<?php
session_start();
include("database.php");

if ($_SESSION['username'] == '') {
    header("location:Login.php");
}

// Assuming you have user information available in session or database
$username = $_SESSION['username'];

$view1 = "select * from insurance where username='$username'";
$GetData1 = mysqli_query($db, $view1);
$GetStatusData = mysqli_fetch_array($GetData1);

// Include the TCPDF library
require_once('tcpdf/tcpdf.php');

// Extend TCPDF to create custom Header and Footer
class MYPDF extends TCPDF
{
    // Page header
    public function Header()
    {
        // Set font for company information
        $this->SetFont('helvetica', '', 10);

        // Company address
        $this->Cell(100, 10, 'Car Solution Insurance', 0, 0, 'L');

        // Move to the right
        $this->Cell(0); // This is just to move to the right, as we don't want anything to be displayed here

        // Company phone number
        $this->Cell(0, 10, '+91 78628 82054', 0, 0, 'R');

        $this->Ln(5); // Line break

        // Set font for title
        $this->SetFont('helvetica', 'B', 12);

        // Title
        $this->Cell(0, 10, 'Car Insurance Details', 0, false, 'C');
        $this->Ln(20); // Adjust this value as needed for additional space
    }


    // Page footer
    public function Footer()
    {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->getAliasNumPage() . ' of ' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

// Create a new TCPDF object using custom class
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator('Car Solution');
$pdf->SetAuthor('Jainish Kanpariya');
$pdf->SetTitle('Car Insurance Details');
$pdf->SetSubject('Car Insurance Details');
$pdf->SetKeywords('Car, Insurance, Details');

// Set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// Set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
// $pdf->SetHeaderMargin(0); // Disable header - Remove this line
$pdf->SetFooterMargin(0); // Disable footer

// Set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Language array for TCPDF
$l = array(
    'a_meta_charset' => 'UTF-8',
    'a_meta_dir' => 'ltr',
    'a_meta_language' => 'en',
    'w_page' => 'page'
);

// Set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// Set some language-dependent strings (optional)
$pdf->setLanguageArray($l);

// Set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(10); // Set header margin to 5mm
$pdf->SetFooterMargin(0); // Disable footer

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('helvetica', '', 12);

// Set content margin top
$contentMarginTop = 30; // Adjust this value as needed

// Write HTML content to the PDF
$html = '
<div class="w-100">
    <table class="table table-bordered border-dark">
        <tbody>
            <tr>
                <td>Name:</td>
                <td>' . $GetStatusData['username'] . '</td>
            </tr>
            <tr>
                <td>Email:</td>
                <td>' . $GetStatusData['email'] . '</td>
            </tr>
            <tr>
                <td>Mobile:</td>
                <td>' . $GetStatusData['mobile'] . '</td>
            </tr>
            <tr>
                <td>Car Number:</td>
                <td>' . $GetStatusData['car_number'] . '</td>
            </tr>
            <tr>
                <td>Rc Book Number:</td>
                <td>' . $GetStatusData['rc_book'] . '</td>
            </tr>
            <tr>
                <td>How Old Car:</td>
                <td>' . $GetStatusData['old_car'] . '</td>
            </tr>
            <tr>
                <td>Policy Number:</td>
                <td>' . $GetStatusData['policy_number'] . '</td>
            </tr>
            <tr>
                <td>Insurance Start Date And Time:</td>
                <td>' . $GetStatusData['insurance_start_date'] . '</td>
            </tr>
            <tr>
                <td>Insurance Type:</td>
                <td>' . $GetStatusData['insurance_type'] . '</td>
            </tr>
            <tr>
                <td>Validity:</td>
                <td>' . $GetStatusData['validity'] . '</td>
            </tr>
            <tr>
                <td>Price:</td>
                <td>' . $GetStatusData['price'] . '</td>
            </tr>
        </tbody>
    </table>
</div>';

$pdf->writeHTML($html, true, false, true, false, '');

$pdf->Output('car-insurance-details.pdf', 'D');

?>
