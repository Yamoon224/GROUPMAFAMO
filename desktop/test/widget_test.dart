import 'package:flutter_test/flutter_test.dart';

import 'package:desktop/main.dart';

void main() {
  test('l\'URL de connexion pointe vers l\'admin', () {
    expect(kLoginUrl, 'https://groupmafamo.jss-gn.com/admin/login');
  });
}
