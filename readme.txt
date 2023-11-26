This is a TYPO3 Extension made by Oliver Pfaff from olli-machts.de .
You will find a documentation under www.olli-machts.de/en/extension/cookie-manager and a small setup tutorial
The Extension development and maintenance is sponsored by Nerdost GmbH (www.nerdost.net)

- HTML/Script tag management
- Grouping of different Cookies alias Script tags
- Multi-domain ready
- Multi-language ready
- Out of the box english and german frontend redering
- Cookie Information Table plugin
- Optin Panel, which loads the scripts only after the optin confirmation
- Google Tag Manager support.
- Customizable, use your own CSS or change the Fluid templates
- Custom javascript events that can be listen

## Changelog
**9.1.0**
- Composer support
- New Group awareness. If the panel finds a new group(with a new ID) it will show up again.
- Improved multi language support
**9.2.0**
- (Sponsored by Gesellschaft für Informatik - gi.de) TypoScript Constant processing inside the cookie HTML field(default:disabled). It must be enabled inside the Extension Settings after that you should clear the system cache.
**9.2.1**
- Bugfix shortening details_nr for writelog method (thx to bashte and Sebastian Richter)
**10.0.0**
- Add TYPO3 10 support
- Improved remember abilities between languages. Know also if your groups are not linked (over the field Transl.Orig) inside the TYPO3 backend, the extension will remember all active groups and not show the panel on every language switch on the frontend side.
**10.0.1**
- BUGFIX if no css or js file is set in the TypoScript Constants no empty file will be added to the page.
**10.0.2**
- [BUGFIX] Fix failing TS constants replacement in HTML. Thanks @maritwho(Sebastian Hofer)
**11.0.0**
- [TASK] TYPO3 11 compatibility (Thx Christoph Dolar)
- [TASK] Improve default CSS for better OS and iOS experience

**11.0.1**
- [BUGFIX] W3C HTML Validation
- [TASK] TYPO3 12 Compatibility preparation (Thx Sebastian Richter and DerBasti)


Icons used in the extension. Visible only in the backend.
Icons made by Smashicons from www.flaticon.com
Icons made by Freepik from www.flaticon.com
Icons made by from www.flaticon.com