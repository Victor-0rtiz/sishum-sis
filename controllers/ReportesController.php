<?php

namespace Controllers;


use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Model\Estudiante;
use Model\Matricula;
use Mpdf\Mpdf;
use MVC\Router;
use TCPDF;

class ReportesController
{
    public static function Matricula(Router $router)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            

            $idMatricula = $_POST["Id"];
            // echo json_encode($idMatricula);
            // return;

            $datos = Matricula::obtenerMatriculaUnica( $idMatricula);
            $datos = $datos[0];

            // Generar el código QR con la URL
            $qrCode = new QrCode("http://localhost:6060" . $datos['qrhash']);
            $qrCode->setSize(90); // Ajusta el tamaño del QR según sea necesario

            // Guardar el QR como imagen en base64
            $writer = new PngWriter();
            $result = $writer->write($qrCode);
            $qrCodeBase64 = base64_encode($result->getString());

            // Ruta absoluta para la imagen de fondo
            $logoPath = '../public/build/img/prueba1asd.png'; // Ajusta esta ruta según sea necesario
            $logoBase64 = base64_encode(file_get_contents($logoPath));

            // Crear la instancia de Dompdf
            // Crear una nueva instancia de mPDF
            $mpdf = new Mpdf();
            $mpdf->SetWatermarkImage('../public/build/img/LOGO 1.png', 0.1,  [115, 150]);
            $mpdf->showWatermarkImage = true;
            // Generar el contenido HTML del PDF
            $htmlContent = '
    
        <head>
            <style>
                
                .container {
                    width: 700px;
                    margin: 0 auto;
                    padding: 15px;
                    background-color: white;
                }

                
                .header {
                    text-align: center;
                }
                .header img {
                    width: 5rem;
                    vertical-align: middle;
                }
              
                .header table {
                    width: 100%;
                }
                .header td {
                    vertical-align: middle;
                }
                .info {
                   
                    margin-top: 10px;
                    color: #7B7D7D;
                    text-align: center;
                }
                .section {
                    margin-top: 20px;
                }
                .section h3 {
                    font-size: 1.2rem;
                }
                .section table {
                    width: 100%;
                    border-collapse: collapse;
                }
                .section table td {
                    padding: 5px;
                    border: 1px solid #ccc;
                }
                .footer {
                    margin-top: 20px;
                    text-align: center;
                    background-color: #f9f9f9;
                    padding: 10px;
                }
                  
               
            </style>
        </head>
        <body style="font-family: Arial, sans-serif; font-size: 12px;">
            <div class="container">
                <div class="header">
                    <table style=" border:none; border-collapse:collapse;">
                        <tr>
                            <td><img src="data:image/png;base64,' . $logoBase64 . '" alt="Logo Institución" style=" margin-right: 1rem;"></td>
                            <td style="" >
                            <h1 >Colegio Humberto Pavón Fonseca</h1>
                            <hr>
                            <div class="info">
                                <table style="border:none; border-collapse:collapse;">
                                 <tr >
                                     <td style="color: #7B7D7D;"> <p><strong>Ubicación:</strong> Catarina, Masaya</p></td>
                                    <td style="color: #7B7D7D;"><p><strong>Correo:</strong> humbertoPavon@gmail.com</p></td> 
                                 </tr>
                                </table>
                             </div>
                             <p> <span style="font-weight: bold;">Telefono:</span> 88888888</p>
                            </td>
                            <td><img src="data:image/png;base64,' . $qrCodeBase64 . '" alt="QR Code"></td>
                        </tr>
                    </table>
                </div>
                
                <h2 style="text-align: center;"><span class="text-mat">Hoja de Matricula</span></h2>
                <div class="section" id="informacion-estudiante">
                    <h3>Datos del Estudiante</h3>
                    <table >
                        <tr style="border:none; border-collapse:collapse;">
                            <td style="border:none; border-collapse:collapse;" ><label> <span style="font-weight: bold;">Nombres del Estudiante: </span> ' . $datos['Nombres_estudiante'] . '</label></td>
                            
                            <td style="border:none; border-collapse:collapse;"><label><span style="font-weight: bold;">Apellidos del Estudiante: </span> ' . $datos['Apellidos_estudiante'] . '</label></td>
                           
                        </tr>
                        <tr style="border:none; border-collapse:collapse;">
                            <td style="border:none; border-collapse:collapse;"><label><span style="font-weight: bold;">Código de Estudiante:  </span> ' . $datos['Cod_estudiante'] . '</label></td>
                       
                            <td style="border:none; border-collapse:collapse;"><label><span style="font-weight: bold;">Sexo: </span>  ' . $datos['Sexo_Estudiante'] . '</label></td>
                            
                        </tr>
                        <tr style="border:none; border-collapse:collapse;">
                            <td style="border:none; border-collapse:collapse;"><label><span style="font-weight: bold;">Edad del Estudiante:  </span> ' . $datos['Edad'] . '</label></td>
                       
                            
                        </tr>
                        
                    </table>
                </div>
                <div class="section" id="informacion-academicos">
                    <h3>Datos Académicos</h3>
                    <table>
                        <tr>
                            <td><label>Turno:</label></td>
                            <td>' . $datos['Id_turno_nombre'] . '</td>
                            <td><label>Año Lectivo:</label></td>
                            <td>' . $datos['Id_anio_lectivo_anio'] . '</td>
                        </tr>
                        <tr>
                            <td><label>Grado:</label></td>
                            <td>' . $datos['Id_grado_nombre'] . '</td>
                        </tr>
                    </table>
                </div>
                <div class="section" id="informacion-tutor">
                    <h3>Datos del Tutor</h3>
                    <table>
                        <tr>
                            <td><label>Nombres del Tutor(a):</label></td>
                            <td>' . $datos['Nombres_tutor'] . '</td>
                            <td><label>Apellidos del Tutor(a):</label></td>
                            <td>' . $datos['Apellidos_tutor'] . '</td>
                        </tr>
                        <tr>
                            <td><label>Cédula de Tutor:</label></td>
                            <td>' . $datos['Cedula'] . '</td>
                            <td><label>Sexo:</label></td>
                            <td>' . $datos['Sexo_Tutor'] . '</td>
                        </tr>
                        <tr>
                            <td><label>Oficio de Tutor:</label></td>
                            <td>' . $datos['Ocupacion'] . '</td>
                        </tr>
                    </table>
                </div>
                <div class="section" id="declaracion-matricula">
                    <h2>Declaración de Matrícula</h2>
                    <p>Por medio de esta matrícula, el tutor <strong> ' . $datos['Nombres_tutor'] . ' </strong> autoriza la matrícula del estudiante <strong>' . $datos['Nombres_estudiante'] . '</strong> en el año lectivo  <strong>' . $datos['Id_anio_lectivo_anio'] . '. </strong> Esta acción certifica la inscripción oficial del estudiante en nuestra institución para el período académico correspondiente.</p>
                </div>
                <div class="section" id="firmas">
                    <table>
                        <tr style="border:none; border-collapse:collapse;">
                            <td  style="text-align: center; padding-top: 20px;border:none; border-collapse:collapse;"><span style="border-top: 1px solid #000;">Firma del Director</span></td>
                            <td style="text-align: center; padding-top: 20px;border:none; border-collapse:collapse;"><span style="border-top: 1px solid #000;">Firma del Tutor</span></td>
                        </tr>
                    </table>
                </div>
                <div class="footer">
                    <p>&copy; 2024 Colegio Humberto Pavón Fonseca. Todos los derechos reservados.</p>
                </div>
            </div>
        </body>
        </html>
        ';

            // Cargar el contenido HTML
            $mpdf->WriteHTML($htmlContent);

            // Configurar la cabecera para devolver el PDF como respuesta
            // Configurar la cabecera para devolver el PDF como respuesta
            header('Content-Type: application/pdf');
            header('Content-Disposition: inline; filename="documento.pdf"');
            header('Cache-Control: private, max-age=0, must-revalidate'); // Opcional, ayuda con ciertos navegadores
            $mpdf->Output('', 'I'); // Eliminado __FILE__
        } else {
            http_response_code(405); // Método no permitido
            exit;
        }
    }
    public static function Boletin(Router $router)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            

            $idMatriculaBoletin = $_POST["Id_matricula"];
            // echo json_encode($idMatriculaBoletin);
            // return;

            $datos = Estudiante::obtenerBoletinEstudiante( $idMatriculaBoletin);

            function getQualitative($nota) {
                if ($nota >= 90) {
                    return 'AA';
                } elseif ($nota >= 76) {
                    return 'AS';
                } elseif ($nota >= 60) {
                    return 'AE';
                } else {
                    return 'AI';
                }
            }
            

            // Generar el código QR con la URL
            $qrCode = new QrCode("http://localhost:6060" .  $idMatriculaBoletin);
            $qrCode->setSize(90); // Ajusta el tamaño del QR según sea necesario

            // Guardar el QR como imagen en base64
            $writer = new PngWriter();
            $result = $writer->write($qrCode);
            $qrCodeBase64 = base64_encode($result->getString());

            // Ruta absoluta para la imagen de fondo
            $logoPath = '../public/build/img/prueba1asd.png'; // Ajusta esta ruta según sea necesario
            $logoBase64 = base64_encode(file_get_contents($logoPath));

            // Crear la instancia de Dompdf
            // Crear una nueva instancia de mPDF
            $mpdf = new Mpdf();
            $mpdf->SetWatermarkImage('../public/build/img/LOGO 1.png', 0.1,  [115, 150]);
            $mpdf->showWatermarkImage = true;
            // Generar el contenido HTML del PDF
            $htmlContent = '
            <head>
                <style>
                    .container {
                        width: 700px;
                        margin: 0 auto;
                        padding: 15px;
                        background-color: white;
                    }
            
                    .header {
                        text-align: center;
                    }
                    .header img {
                        width: 5rem;
                        vertical-align: middle;
                    }
            
                    .header table {
                        width: 100%;
                    }
                    .header td {
                        vertical-align: middle;
                    }
                    .info {
                        margin-top: 10px;
                        color: #7B7D7D;
                        text-align: center;
                    }
                    .section {
                        margin-top: 20px;
                    }
                    .section h3 {
                        font-size: 1.2rem;
                    }
                    .section table {
                        width: 100%;
                        border-collapse: collapse;
                    }
                    .section table td, .section table th {
                        padding: 5px;
                        border: 1px solid #ccc;
                    }
                    .footer {
                        margin-top: 20px;
                        text-align: center;
                        background-color: #f9f9f9;
                        padding: 10px;
                    }
                </style>
            </head>
            <body style="font-family: Arial, sans-serif; font-size: 12px;">
                <div class="container">
                    <div class="header">
                        <table style="border:none; border-collapse:collapse;">
                            <tr>
                                <td><img src="data:image/png;base64,' . $logoBase64 . '" alt="Logo Institución" style="margin-right: 1rem;"></td>
                                <td>
                                    <h1>Colegio Humberto Pavón Fonseca</h1>
                                    <hr>
                                    <div class="info">
                                        <table style="border:none; border-collapse:collapse;">
                                            <tr>
                                                <td style="color: #7B7D7D;"><p><strong>Ubicación:</strong> Catarina, Masaya</p></td>
                                                <td style="color: #7B7D7D;"><p><strong>Correo:</strong> humbertoPavon@gmail.com</p></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <p><span style="font-weight: bold;">Telefono:</span> 88888888</p>
                                </td>
                                <td><img src="data:image/png;base64,' . $qrCodeBase64 . '" alt="QR Code"></td>
                            </tr>
                        </table>
                    </div>
                    
                    <h2 style="text-align: center;"><span class="text-mat">Reporte de Notas</span></h2>
                    
                    <div class="section" id="informacion-estudiante">
                        <h3>Datos del Estudiante</h3>
                        <table>
                            <tr style="border:none; border-collapse:collapse;">
                                <td style="border:none; border-collapse:collapse;"><label><span style="font-weight: bold;">Nombres del Estudiante: </span>' . $datos[0]['Estudiante_Nombres'] . '</label></td>
                                <td style="border:none; border-collapse:collapse;"><label><span style="font-weight: bold;">Código de Estudiante: </span>' . $datos[0]['Cod_estudiante'] . '</label></td>
                            </tr>
                        </table>
                    </div>
                    
                    <div class="section" id="informacion-notas">
                        <h3>Notas del Estudiante</h3>
                        <table>
                            <thead>
                                <tr>
                                    <th rowspan="2">Asignatura</th>
                                    <th colspan="2">Evaluación 1</th>
                                    <th colspan="2">Evaluación 2</th>
                                    <th colspan="2">Evaluación 3</th>
                                    <th colspan="2">Evaluación 4</th>
                                    <th colspan="2">Nota Final</th>
                                </tr>
                                <tr>
                                    <th>Cuan.</th>
                                    <th>Cual.</th>
                                    <th>Cuan.</th>
                                    <th>Cual.</th>
                                    <th>Cuan.</th>
                                    <th>Cual.</th>
                                    <th>Cuan.</th>
                                    <th>Cual.</th>
                                    <th>Cuan.</th>
                                    <th>Cual.</th>
                                </tr>
                            </thead>
                            <tbody>';
            
            // Iterar sobre los datos para generar filas de notas
            foreach ($datos as $dato) {
                $qualitative1 = getQualitative($dato['Nota']);
                $qualitative2 = getQualitative($dato['Nota_2']);
                $qualitative3 = getQualitative($dato['Nota_3']);
                $qualitative4 = getQualitative($dato['Nota_4']);
                $qualitativeFinal = getQualitative($dato["Promedio_Redondeado"]);
            
                $htmlContent .= '
                                <tr>
                                    <td>' . $dato['Asignatura_Nombre'] . '</td>
                                    <td>' . $dato['Nota'] . '</td>
                                    <td>' . $qualitative1 . '</td>
                                    <td>' . $dato['Nota_2'] . '</td>
                                    <td>' . $qualitative2 . '</td>
                                    <td>' . $dato['Nota_3'] . '</td>
                                    <td>' . $qualitative3 . '</td>
                                    <td>' . $dato['Nota_4'] . '</td>
                                    <td>' . $qualitative4 . '</td>
                                    <td>' . $dato['Promedio_Redondeado'] . '</td>
                                    <td>' . $qualitativeFinal . '</td>
                                </tr>';
            }
            
            $htmlContent .= '
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="section" id="firmas">
                        <table>
                            <tr style="border:none; border-collapse:collapse;">
                                <td style="text-align: center; padding-top: 20px;border:none; border-collapse:collapse;"><span style="border-top: 1px solid #000;">Firma del Director</span></td>
                                <td style="text-align: center; padding-top: 20px;border:none; border-collapse:collapse;"><span style="border-top: 1px solid #000;">Firma del Tutor</span></td>
                            </tr>
                        </table>
                    </div>
                    
                    <div class="footer">
                        <p>&copy; 2024 Colegio Humberto Pavón Fonseca. Todos los derechos reservados.</p>
                    </div>
                </div>
            </body>
            </html>
            ';
            // Cargar el contenido HTML
            $mpdf->WriteHTML($htmlContent);

            // Configurar la cabecera para devolver el PDF como respuesta
            // Configurar la cabecera para devolver el PDF como respuesta
            header('Content-Type: application/pdf');
            header('Content-Disposition: inline; filename="documento.pdf"');
            header('Cache-Control: private, max-age=0, must-revalidate'); // Opcional, ayuda con ciertos navegadores
            $mpdf->Output('', 'I'); // Eliminado __FILE__
        } else {
            http_response_code(405); // Método no permitido
            exit;
        }
    }


    public static function deslogearse(Router $router)
    {
        // session_start();
        // $_SESSION = [];
        // session_destroy();
        // header('Location: /');
    }
}
