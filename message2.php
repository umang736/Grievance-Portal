.DefStyle
		    {
		    	font-family:Verdana;
		    	color:green;
		    	font-size:9px;
		    	border-width:1px;
		    	border-color:Black;
		    	border-style:outset;
		    	padding:5px,5px,5px,5px,5px;
		    	display:none;
				width:300px;
				left:700px;
				top:456px;
				position:fixed;
		    }
            function ShowDef(definitionObjectName)
			{
			    document.getElementById(definitionObjectName).style.display="block";
			}
			

			function HideDef(definitionObjectName)
			{
				document.getElementById(definitionObjectName).style.display="none";
			}
             onmouseout=\"HideDef('validpass');\" onmouseover=\"ShowDef('validpass');\"
            echo "<span class=\"DefStyle\" id=\"validpass\" >The password should contain a small alphabet,a <br />large alphabet,a special character and a number</span>";