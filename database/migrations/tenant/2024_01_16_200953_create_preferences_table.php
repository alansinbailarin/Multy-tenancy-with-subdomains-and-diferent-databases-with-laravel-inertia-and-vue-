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
        Schema::create('preferences', function (Blueprint $table) {
            $table->id();

            $table->string('navbar_button_primary_color')->default('#3B82F6');
            $table->string('navbar_button_primary_text_color')->default('#FFFFFF');
            $table->string('navbar_button_primary_text')->default('Schedule an appointment');
            $table->string('navbar_button_secondary_color')->default('#FFFFFF');
            $table->string('navbar_button_secondary_text_color')->default('#374151');
            $table->string('navbar_button_secondary_text')->default('Call to reserve');
            $table->string('navbar_color')->default('#FFFFFF');
            $table->string('background_color')->default('#FFFFFF');
            $table->string('heading_text_color')->default('#1F2937');
            $table->string('paragraph_text_color')->default('#9CA3AF');
            $table->string('hero_button_primary_color')->default('#3B82F6');
            $table->string('hero_button_primary_text')->default('Schedule an appointment');
            $table->string('hero_button_primary_text_color')->default('#FFFFFF');
            $table->string('hero_button_secondary_color')->default('#F5F5F5');
            $table->string('hero_button_secondary_text_color')->default('#374151');
            $table->string('hero_button_secondary_text')->default('Call to reserve');
            $table->string('hero_heading_text')->default('Welcome to your new website');
            $table->string('hero_paragraph_text')->default('This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.');
            $table->boolean('show_under_hero')->default(true);
            $table->string('under_hero_background_color')->default('#F5F5F5');
            $table->string('under_hero_text_color')->default('#1C1C1C');
            $table->string('under_hero_phone_number_text')->default('+1 1234 231 123');
            $table->string('under_hero_address_text')->default('Fake address #123');
            $table->string('under_hero_schedule_hours_text')->default('M - S 10 A.M. - 8 P.M.');
            $table->string('under_hero_icons_size')->default('14');
            $table->boolean('show_about_us')->default(true);
            $table->string('about_us_heading_text')->default('About us');
            $table->string('about_us_heading_text_color')->default('#1F2937');
            $table->string('about_us_img_path')->nullable();
            $table->text('about_us_text')->default('This is a simple about us section, here you can write about your business, your services, your team, etc.');
            $table->string('about_us_text_color')->default('#1C1C1C');
            $table->text('about_us_text_extra_one_title')->default('Extra about, example: Phone number');
            $table->text('about_us_text_extra_two_title')->default('Extra about, example: Oportunities');
            $table->text('about_us_text_extra_one')->default('This is a simple about us section, here you can write about your business, your services, your team, etc.');
            $table->text('about_us_text_extra_two')->default('This is a simple about us section, here you can write about your business, your services, your team, etc.');

            $table->boolean('show_team')->default(true);
            $table->string('our_team_heading_text')->default('Our team');
            $table->string('our_team_heading_text_color')->default('#1F2937');
            $table->string('our_team_text_color')->default('#1C1C1C');
            $table->string('our_team_name_text_color')->default('#1F2937');
            $table->string('our_team_position_text_color')->default('#9CA3AF');
            $table->string('our_team_description_text_color')->default('#9CA3AF');

            $table->string('footer_text_color')->default('#9CA3AF');
            $table->string('rights_reserved_text')->default('. All rights reserved.');

            $table->unsignedBigInteger('establishment_id')->nullable();

            $table->foreign('establishment_id')
                ->references('id')
                ->on('establishments')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preferences');
    }
};
