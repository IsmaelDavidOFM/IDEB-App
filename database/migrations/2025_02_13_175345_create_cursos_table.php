<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Nomenclatura');
            $table->string('NombredelCurso');
            $table->string('DescripciondeCurso');
            $table->decimal('CostodelCurso');
            $table->string('InstructorResponsable');
            $table->date('FechadeInicio');
            $table->date('FechadeTermino');
            $table->string('Virtual');
            $table->string('Presencial');
            $table->string('Mixto');
            $table->string('SinFecha');
            $table->string('DriveSinFecha');
            $table->string('Facebook');
            $table->string('DriveFacebook');
            $table->string('Linkedin');
            $table->string('DriveLinkedin');
            $table->string('Instagram');
            $table->string('DriveInstagram');
            $table->string('Temario');
            $table->string('DriveTemario');
            $table->string('Itinerario');
            $table->string('DriveItinerario');
            $table->string('Planeacion');
            $table->string('DrivePlaneacion');
            $table->string('Digital');
            $table->string('DriveDigital');
            $table->string('Impreso_Presentable');
            $table->string('Presentacion');
            $table->string('Evaluacion_diagnostica');
            $table->string('EvaluaciondeSatisfaccion');
            $table->string('EvaluacionFinal');
            $table->string('DC3');
            $table->date('FechadeRegistro_STPS')->nullable();
            $table->string('Formato_DC5');
            $table->string('Formato_DC5_Tienefirma');
            $table->string('Certificadodecomprobacion');
            $table->string('DrivedeCertificadodecomprobacion');
            $table->string('Cartapoder_tienefirma');
            $table->string('DriveCartapoder');
            $table->string('UDEMY');
            $table->string('EnlaceUDEMY', 500)->default('https://www.udemy.com/?utm_source=adwords-brand&utm_medium=udemyads&utm_campaign=Brand-Udemy_la.EN_cc.ROW&campaigntype=Search&portfolio=BrandDirect&language=EN&product=Course&test=&audience=Keyword&topic=&priority=&utm_content=deal4584&utm_term=_._ag_80315195513_._ad_535757779892_._kw_udemy_._de_c_._dm__._pl__._ti_kwd-296956216253_._li_9141720_._pd__._&matchtype=b&gad_source=1&gclid=Cj0KCQiA-aK8BhCDARIsAL_-H9lEmjQtXFycmgLukQy8atgN35zjJPASolKxrBoHXn1K4kx4Va1-Bl8aAu5OEALw_wcB');
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->string('Duracioncurso', 100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};
