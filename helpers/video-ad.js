var Handlebars = require('handlebars');

/*
 * A helper that evaluates the anvatoAd value in video partials
 * and returns the proper dfp ad value.
 *
 * Takes 'statesman', 'austin360' or 'mystatesman'.
 * The 'mystatesman' version removes the ad call per CMGt docs.
 * If the anvatoAd value is missing, it uses 'statesman' ads.
 *
 */

module.exports = function(anvatoAd) {

  // check if mystatesman, which returns blank to remove call
  if(anvatoAd == 'mystatesman') {
    var code = ''
  }
  // moves on to other possible values
  else {
      //  test if austin360 to set ad value
      if(anvatoAd == 'austin360') {
        var adSite = 'austin_np/aas_a360_web_default';
      }
      // if not austin360, then assume statesman
      else {
        var adSite = 'Austin_NP/aas_web_default'
      }
    // returns ad call part of the anvato embed.
    var code = 'dfp: {' +
                'clientSide: {' +
                    'adTagUrl:\'https://pubads.g.doubleclick.net/gampad/ads?sz=400x300&iu=/12523293/' + adSite + '&cmsid=17693&vid=ANV_ANV[[VIDEO_ID]]&ciu_szs&impl=s&gdfp_req=1&env=vp&output=vast&unviewed_position_start=1&url=[referrer_url]&description_url=[description_url]&correlator=[timestamp]\'' +
                '}' +
            '},'
  } 

  return new Handlebars.SafeString(code);
};
