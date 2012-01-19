<?php
include '/include/header.php';
?>
    <div class="navigation">
    	U bent hier: <b>Registratie</b>
    </div>
  <div class="content"><h1>Registratie</h1>
  <div class="catbalk">Registratieformulier</div>
  <div class="forumhok"><b>Vul hier uw gegeven in:</b><br />
  <form>
              	<div class="formulier">
                    <span><b>Naam</b></span>
						<input name="username" size="35" class="paneelinvoer"/>	
					<br />
                    <span><b>Email</b></span>
						<input name="email" size="35" class="paneelinvoer"/>
					<br />
                    <span><b>Herhaal email</b></span>
						<input name="emailcheck" size="35" class="paneelinvoer"/>
					<br />
                    <span><b>Geslacht</b></span>
						<select class="paneelinvoer" name="weergave" >
                                    <option value="Man">Man</option>
                                    <option value="Vrouw">Vrouw</option>
									<option value="Onbekend">Zeg ik liever niet</option>
						</select>	
					<br />
                    <span><b>Geboortedatum</b></span>
						<select name="gebdag" class="paneelinvoer2" style="width:10%;">
							<?php
								for($i=1;$i<32;$i++)
								{
									echo('<option value="'.$i.'">'.$i.'</option>');	
								}
							?>
						</select>
						<select name="gebmaand" class="paneelinvoer2" style="width:25%;">
							<option value="januari">Januari</option>
							<option value="februai">Februari</option>
							<option value="maart">Maart</option>
							<option value="april">April</option>
							<option value="mei">Mei</option>
							<option value="juni">Juni</option>
							<option value="juli">Juli</option>
							<option value="augustus">Augustus</option>
							<option value="september">September</option>
							<option value="oktober">Oktober</option>
							<option value="november">November</option>
							<option value="december">December</option>
						</select>
						<select name="gebjaar" class="paneelinvoer2" style="width:15%;">
							<?php
								for($i=2012;$i>1900;$i--)
								{
									echo('<option value="'.$i.'">'.$i.'</option>');	
								}
							?>
						</select>
					<br/>
                    <span><b>Locatie</b></span>
						<input name="location" size="35" class="paneelinvoer"/>
                        <br />
               	</div>
		<div class="registeragree">
Do your layouts deserve better than Lorem Ipsum? Apply as an art director and team up with the best copywriters at Jung von Matt: www.jvm.com/jobs/lipsum

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque enim massa, ultricies in molestie nec, egestas eget nisi. Fusce convallis laoreet turpis quis pretium. Donec at est vel purus eleifend ultrices. In vestibulum, ante a congue accumsan, libero sapien convallis orci, in pulvinar neque nunc id lorem. In lacus nisl, eleifend eleifend dignissim eu, rutrum a sem. Fusce dictum luctus metus, ac tempor purus sodales at. Duis mattis ullamcorper sapien a laoreet. Fusce a purus ut nisi feugiat venenatis sed ac lacus. Aenean pretium tellus sit amet mauris tempor tempor. Proin sed erat dui, eu elementum diam. Donec vel arcu eget ligula convallis fermentum at accumsan massa. Quisque feugiat rhoncus laoreet. Morbi non sodales orci. Cras odio sem, sagittis dapibus vehicula id, mollis eu lectus.

Cras vehicula pellentesque nunc in lobortis. Nulla eros ligula, scelerisque et mattis eget, pulvinar at lorem. Quisque nisi mi, eleifend vel pulvinar sit amet, ullamcorper pretium neque. Sed non venenatis orci. Nunc nec neque ac leo scelerisque semper ut at neque. Duis hendrerit, nulla id egestas feugiat, augue libero laoreet tortor, laoreet dictum arcu neque vitae orci. In tempus varius lacus vehicula elementum. Pellentesque malesuada malesuada arcu, sit amet mollis odio posuere eu. Quisque adipiscing rutrum dictum. Aliquam tempor adipiscing elit. Fusce eu pharetra nisl. Nam euismod nunc a lorem molestie tempor. In et enim eget dolor fermentum iaculis.

Ut libero dolor, tempus ac rutrum in, pretium a felis. Curabitur dictum odio ut tellus volutpat semper. Vestibulum eu libero orci, consequat facilisis quam. Ut tempor, nulla vitae tincidunt rutrum, ante lacus lacinia est, eu condimentum est tellus et mauris. Donec viverra convallis ornare. Sed eu lacus a risus accumsan cursus sed nec nibh. Ut in tellus vel tortor sodales scelerisque. Vivamus ut enim sapien, nec facilisis augue. Donec non turpis nunc. Pellentesque commodo laoreet nisi, id vehicula eros vehicula ac. Morbi vitae felis nulla, ac tempor mi. In condimentum viverra tristique. Cras consectetur pulvinar quam quis congue. In quis augue eu urna ultricies interdum. Cras a mi sagittis arcu luctus vulputate. Nam ullamcorper convallis ante non vestibulum.

Suspendisse nisl risus, faucibus luctus ornare laoreet, semper bibendum diam. Sed vitae lorem augue, at posuere magna. Etiam sit amet tellus luctus enim ultrices cursus a a quam. Ut posuere lacinia arcu vel malesuada. Phasellus purus eros, ornare ut euismod sed, gravida at eros. Nam auctor mattis enim, et rhoncus tellus adipiscing vitae. Vestibulum interdum laoreet erat, at vehicula metus accumsan vitae. Donec fringilla felis suscipit est feugiat vehicula.

Vestibulum rhoncus congue justo, in iaculis neque dapibus sed. Aliquam erat volutpat. Donec in enim nec ante luctus facilisis nec nec leo. Proin volutpat, arcu eget consequat accumsan, urna lorem ullamcorper dui, non aliquam diam ligula vel massa. Suspendisse potenti. Nullam neque urna, tristique et euismod a, pharetra ut quam. Fusce iaculis tincidunt orci. Aenean blandit risus in erat pellentesque ac commodo erat pharetra.

Nullam nec ipsum a enim euismod pulvinar. Nullam vestibulum volutpat enim, ut molestie dui euismod ut. Suspendisse nec auctor enim. Donec lacinia mauris in dolor tempor eu congue mi feugiat. Duis a odio velit. Maecenas placerat convallis orci, ut blandit turpis pellentesque in. Sed scelerisque tempus feugiat. Morbi in dolor lacus, in porta elit.

Integer vitae mi quis est consectetur pulvinar. Nunc fermentum auctor nisi vel consequat. Aenean facilisis commodo urna convallis auctor. Etiam euismod nunc id risus imperdiet vestibulum. Nam vel nibh at massa fermentum vestibulum. Pellentesque justo neque, hendrerit eu commodo a, tincidunt in sem. Proin ante leo, faucibus nec semper at, blandit eget purus. Pellentesque mattis nisl et leo accumsan non suscipit erat eleifend. Aliquam a eros nulla. Praesent tincidunt tincidunt aliquet. Etiam quis adipiscing purus.

Sed scelerisque nisl in neque rhoncus consectetur. Suspendisse potenti. Nam sapien nibh, eleifend in scelerisque sed, tincidunt quis urna. Nunc a ipsum id eros semper egestas sit amet a erat. Duis id mi libero, et accumsan enim. Sed magna odio, fermentum mollis rutrum in, adipiscing id neque. Pellentesque rutrum aliquam rhoncus. Praesent non ante orci, ut aliquam justo. In enim lectus, malesuada ac fermentum at, convallis viverra libero. Donec commodo odio eu quam interdum eu consectetur nisl pellentesque. Aliquam eget odio in libero pulvinar semper nec varius massa. Donec molestie magna ac odio imperdiet nec viverra justo tempus. Pellentesque venenatis, ipsum quis vehicula adipiscing, dolor nisl malesuada lectus, congue faucibus nulla odio ut tellus. 
		</div>
		<input type="checkbox" name="accept" value="true" />Ik heb de gebruikersvoorwaarde gelezen en ga akkoord<br />
		<input type="submit" value="Verstuur" />
	</form>
	</div>
	</div>   
<?php
include '/include/footer.php';
?>
