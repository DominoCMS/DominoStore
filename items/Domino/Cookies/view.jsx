﻿DominoViews.registerView( 'Domino.Cookies', function( data ) {	"use strict";	if ( data.display == true )		return <div class="domino-cookies">			<div class="grid-x grid-padding-x">				<div class="cell">				{ DCUtil.displayHtml( data.text ) }					{ ' ' }				<a id="cookiesAccept" class="btn" href="#">{ data.accept }</a>				</div>			</div>		</div>	});