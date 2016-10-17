<?php
function getICEcatProductSpecs($ean, $drawdescription = 0, $drawpicture = 0)
{
	// Username and password for usage with ICEcat
	$username = "noon.com";
	$password = "icecat2016";

	// Return 0 and exit function if no EAN available
	if($ean == null)
	{
	echo 'Barcode cannot be blank';
	}

	// Get the product specifications in XML format
	$context = stream_context_create(array(
		'http' => array(
			'header'  => "Authorization: Basic " . base64_encode($username.":".$password)
		)
	));
	$data = file_get_contents('http://data.icecat.biz/xml_s3/xml_server3.cgi?ean_upc='.$ean.';lang=en;output=productxml', false, $context);
	$xml = new SimpleXMLElement($data);


	// Create arrays of item elements from the XML feed
	$productPicture = $xml->xpath("//Product");
	$productDescription = $xml->xpath("//ProductDescription");
  $categories = $xml->xpath("//CategoryFeatureGroup");
	$spec_items = $xml->xpath("//ProductFeature");

var_dump(json_encode($productDescription));

	//Draw product specifications table if any specs available for the product
	if($spec_items != null)
	{
		$categoryList = array();
		foreach($categories as $categoryitem) {
			$catId = intval($categoryitem->attributes());
			$titleXML = new SimpleXMLElement($categoryitem->asXML());
			$title = $titleXML->xpath("//Name");
			$catName = $title[0]->attributes();
			//echo $catId . $catName['Value']. "<br />";
			$categoryList[$catId] = $catName['Value'];
		}

		$specs =  "<table class='productspecs'>";
		$i = 0;

		$drawnCategories = array();

		foreach($spec_items as $item) {
			$specValue = $item->attributes();
			$titleXML = new SimpleXMLElement($item->asXML());
			$title = $titleXML->xpath("//Name");
			$specName = $title[0]->attributes();
			$specCategoryId = intval($specValue['CategoryFeatureGroup_ID']);

			if($specName['Value'] != "Source data-sheet")
			{
				$class = $i%2==0?"odd":"even";
				$specs .= "<tr class='".$class."'>
						<td>
							<table>";
				if(!in_array($specCategoryId, $drawnCategories))
				{
					$specs .= "	<tr class='speccategory'>
									<th><h3>".$categoryList[$specCategoryId]."</h3></th>
								</tr>";
					$drawnCategories[$i] = $specCategoryId;
				}
				$specs .= "		<tr>
									<th>".utf8_decode($specName['Value']).":</th>
								</tr>
								<tr>
									<td>";
											if($specValue['Presentation_Value'] == "Y")
											{
												$specs .= "Ja <img src='".SCRIPT_ROOT."images/check_green.png' alt='Ja' />";
											}
											else if($specValue['Presentation_Value'] == "N")
											{
												$specs .= "Nee <img src='".SCRIPT_ROOT."images/check_red.png' alt='Nee' />";
											}
											else
											{
												$specs .= str_replace('\n', '<br />', utf8_decode($specValue['Presentation_Value']));
											}
							$specs .= "</td>
								</tr>
							</table>
						</td>
					</tr>";
			}
			$i++;
		}
		$specs .= "</table>";

		//Draw product description and link to manufacturer if available
		if( $drawdescription != 0)
		{
			foreach($productDescription as $item) {
				$productValues = $item->attributes();
				if($productValues['URL'] != null)
				{
					$specs .= "<p id='manufacturerlink'><a href='".$productValues['URL']."'>Productinformation from manufacturer</a></p>";
				}
				if($productValues['LongDesc'] != null)
				{
					$description = utf8_decode(str_replace('\n', '', $productValues['LongDesc']));
					$description = str_replace('<b>', '<strong>', $description);
					$description = str_replace('<B>', '<strong>', $description);
					$description = str_replace('</b>', '</strong>', $description);
					$specs .= "<p id='manudescription'>".$description."</p>";
				}
}
		}

		//Draw product picture if available
		if( $drawdescription != 0)
		{
			foreach($productPicture as $item) {
				$productValues = $item->attributes();
				if($productValues['HighPic'] != null)
				{
					$specs .= "<div id='manuprodpic'><img src='".$productValues['HighPic']."' alt='' /></div>";
				}
			}
		}
		return $specs;
	}
	else
	{
		return 0;
	}

	echo $specs;
}
