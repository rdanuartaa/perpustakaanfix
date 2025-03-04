public function up()
{
    Schema::create('officers', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('position');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('officers');
}
