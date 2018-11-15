// JavaScript Document

		var iFilesNeeded = 0;
		var iFilesTotal = 0;
		var bDownloadingFile = false;
		
		var iDifference = 0;
		var iPercentage = 0;
 
		function SetFilesNeeded( needed, total )
		{
			iFilesNeeded = needed;			
			RefreshFileBox();
		}
		function SetFilesTotal( total )
		{
			iFilesTotal = total;
			RefreshFileBox();
		}
		function DownloadingFile( filename )
		{
			if ( bDownloadingFile )
			{
				iFilesNeeded = iFilesNeeded - 1;
				RefreshFileBox();
			}
			document.getElementById( "download-item" ).innerHTML = "<p>" + filename + "</p>";
			bCanChangeStatus = false;
			setTimeout( "bCanChangeStatus = true;", 1000 );
			bDownloadingFile = true;
		}
		function SetStatusChanged( status )
		{
			if ( bDownloadingFile )
			{
				iFilesNeeded = iFilesNeeded - 1;
				bDownloadingFile = false;
				RefreshFileBox();
			}
			document.getElementById( "download-item" ).innerHTML = "<p>" + status + "</p>";
			bCanChangeStatus = false;
			setTimeout( "bCanChangeStatus = true;", 1000 );
		}
		
		function GameDetails( servername, serverurl, mapname, maxplayers, steamid, gamemode ) {
			document.getElementById( "s-name" ).innerHTML = servername;
			document.getElementById( "s-map" ).innerHTML = mapname;
			document.getElementById( "s-mode" ).innerHTML = gamemode;
		}