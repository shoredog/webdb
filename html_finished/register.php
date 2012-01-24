<?php
include '/include/header.php';
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
			?>
		</b><br />
		<form>
			<div class="formulier">
				<span>
					<b>
						<?php
						$regname;
						?>
					<b>
				</span>
				<input name="username" size="35" class="paneelinvoer" />
				<br />
				<span><b>Email</b></span>
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
					<b>
				</span>
				<select class="paneelinvoer" name="weergave" >
					<option value="Man">Man</option>
					<option value="Vrouw">Vrouw</option>
					<option value="Onbekend">Zeg ik liever niet</option>
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
			?>	
		</form>
	</div>
</div>

<?php
include '/include/footer.php';
?>