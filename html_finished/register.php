<?php
include 'include/header.php';
?>

<div class="navigation">
	<?php
	echo "$alglocatie $reg";
	?>
</div>

<div class="content">
	<h1>Registratie</h1>
	<div class="catbalk">
		<?php
		echo $regform;
		?>
	</div>
	<div class="forumhok">
		<b>
			<?php
			echo $regform;
			
			if(isset($_POST['send']))
			{	
				$succes = true;
				$errors = array();
				
				$qry = sprintf('SELECT user_id FROM users WHERE user_name=\'%s\'', $_POST['username']);
				$result = mysql_query($qry);
				
				$qry2 = sprintf('SELECT user_id FROM users WHERE email=\'%s\'', $_POST['email']);
				$result2 = mysql_query($qry2);
				
				if(mysql_num_rows($result) > 0) 
					{
						$errors[] = "Gebruikersnaam bestaat al, kies een andere naam." ;
						$succes = false;
					}
				if(empty($_POST['username']))	
					{
						$errors[] = "U heeft geen gebruikersnaam ingevuld." ;
						$succes = false;
					}
				if(mysql_num_rows($result2) > 0) 
					{
						$errors[] = "Er is al een account geregistreerd op dit e-mailadres." ;
						$succes = false;
					}
				if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", filterInput($_POST['email'])))
					{
						$errors[] = "U heeft een ongeldig e-mail adres opgegeven.";	
						$succes = false;
					}
				if(filterInput($_POST['email']) !== filterInput($_POST['emailcheck']))
				{
					$errors[] = "De door U opgeven e-mailadressen komen niet overeen.";
					$succes = false;
				}
				if(empty($_POST['accept']))
				{
					$errors[] = "U moet de gebruikersvoorwaarde accepteren voordat uw zich kan registreren.";
					$succes = false;
				}
				if($succes == true)
				{
					for($a=0;$a<8;$a++) {
					@$pass .= chr(rand(33,123));
					}
					
					$rday = date("Y-m-d");
					
					$query=sprintf('INSERT INTO users SET user_name=\'%s\' , email=\'%s\' , password=\'%s\', date_of_birth=\'%s-%s-%s\', location=\'%s\', sex=\'%s\', date_of_registration=\'%s\'', 
					 filterInput($_POST['username']), filterInput($_POST['email']), sha1($pass), $_POST['gebjaar'], $_POST['gebmaand'], $_POST['gebdag'], filterInput($_POST['location']), $_POST['sex'], $rday  );
					
					mysql_query($query);
					
					$to = $_POST['email'];
					$subject = "Welcome to ShoreDog";
					$header = "From: Shoredog" ."\r\n"  .
					$body = "Welcome $username, \n
							Your password is $pass \p
							Good luck on our site, \n
							The ShoreDog Team";
					mail($to, $subject, $body, $header);
					
					{ ?>
					Uw registratie is gelukt. Controleer uw inbox voor een e-mail met uw wachtwoord. <br />
					<?php }
					echo $pass;
				}
				else
					{
						echo('<br /><b><span style="color:red; width:auto">De volgende fouten zijn opgetreden:</span></b><br />');
						echo('<ul>');
						foreach($errors as $error)
						echo("<li>$error</li>\n");
						echo('</ul>');	
					}
							
			}
			if(!isset($succes) || $succes == false)
			{
			
			?>
		</b><br />
		
		<form method="post" action="<?php echo($_SERVER['PHP_SELF']) ?>">
			<div class="formulier">
			
				<span>
					<b>
						<?php
						echo $regname;
						?>
					</b>
				</span>
				<input name="username" size="35" class="paneelinvoer" />
				<br />
				<span><b>E-mail</b></span>
				<input name="email" size="35" class="paneelinvoer"/>
				<br />
				<span>
					<b>
						<?php
						echo $regrepmail;
						?>
					</b>
				</span>
				<input name="emailcheck" size="35" class="paneelinvoer"/>
				<br />
				<span>
					<b>
						<?php
						echo $regsex;
						?>
					</b>
				</span>
				<select class="paneelinvoer" name="sex" >
					<option value="x">Zeg ik liever niet</option>
					<option value="m">Man</option>
					<option value="v">Vrouw</option>
				</select>	
				<br />
				<span>
					<b>
						<?php
						echo $regbday;
						?>
					</b>
				</span>
				<select name="gebdag" class="paneelinvoer2" style="width:10%;">
				<?php
				for($i=1;$i<32;$i++)
				{
					echo('<option value="'.$i.'">'.$i.'</option>');	
				}
				?>
				</select>
				<select name="gebmaand" class="paneelinvoer2" style="width:25%;">
					<option value="01">Januari</option>
					<option value="02">Februari</option>
					<option value="03">Maart</option>
					<option value="04">April</option>
					<option value="05">Mei</option>
					<option value="06">Juni</option>
					<option value="07">Juli</option>
					<option value="08">Augustus</option>
					<option value="09">September</option>
					<option value="10">Oktober</option>
					<option value="11">November</option>
					<option value="12">December</option>
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
				<span>
					<b>
						<?php
						echo $regloc;
						?>
					</b>
				</span>
				<input name="location" size="35" class="paneelinvoer"/>
				<br />
			</div>
			<div class="registeragree">
				<?php 
				echo $regliscence;
				?>	
			</div>

			<input type="checkbox" name="accept" value="true" />
			<?php 
			echo $regagree;
			?>	
			<br />
			<?php 
			echo $regbutton;
			}
			?>	
		</form>
	</div>
</div>

<?php
include 'include/footer.php';
?>