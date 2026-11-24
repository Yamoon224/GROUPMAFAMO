import 'dart:async';

import 'package:flutter/material.dart';
import 'package:webview_windows/webview_windows.dart';
import 'package:window_manager/window_manager.dart';

/// Adresse de l'interface d'administration.
const String kLoginUrl = 'https://groupmafamo.jss-gn.com/admin/login';
const String kAppTitle = 'GROUP MAFAMO';
const Color kBlue = Color(0xFF0B6FAE);
const Color kOrange = Color(0xFFFF6A00);

Future<void> main() async {
  WidgetsFlutterBinding.ensureInitialized();

  await windowManager.ensureInitialized();
  const options = WindowOptions(
    size: Size(1280, 800),
    minimumSize: Size(900, 600),
    center: true,
    title: kAppTitle,
    titleBarStyle: TitleBarStyle.normal,
  );
  await windowManager.waitUntilReadyToShow(options, () async {
    await windowManager.show();
    await windowManager.focus();
  });

  runApp(const MafamoApp());
}

class MafamoApp extends StatelessWidget {
  const MafamoApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: kAppTitle,
      debugShowCheckedModeBanner: false,
      theme: ThemeData(
        useMaterial3: true,
        colorScheme: ColorScheme.fromSeed(seedColor: kBlue, secondary: kOrange),
      ),
      home: const AdminShell(),
    );
  }
}

class AdminShell extends StatefulWidget {
  const AdminShell({super.key});

  @override
  State<AdminShell> createState() => _AdminShellState();
}

class _AdminShellState extends State<AdminShell> {
  final _controller = WebviewController();
  final List<StreamSubscription> _subs = [];

  bool _ready = false;
  bool _loading = true;
  String? _error;

  @override
  void initState() {
    super.initState();
    _init();
  }

  Future<void> _init() async {
    try {
      await _controller.initialize();

      _subs.add(_controller.loadingState.listen((s) {
        if (mounted) setState(() => _loading = s == LoadingState.loading);
      }));
      _subs.add(_controller.title.listen((t) {
        if (t.isNotEmpty) windowManager.setTitle('$t — $kAppTitle');
      }));

      await _controller.setBackgroundColor(Colors.white);
      await _controller.setPopupWindowPolicy(WebviewPopupWindowPolicy.sameWindow);
      await _controller.loadUrl(kLoginUrl);

      if (mounted) setState(() => _ready = true);
    } catch (e) {
      if (mounted) {
        setState(() => _error =
            'Impossible d\'initialiser le navigateur intégré.\n'
            'Installez "Microsoft Edge WebView2 Runtime" puis relancez l\'application.\n\n$e');
      }
    }
  }

  @override
  void dispose() {
    for (final s in _subs) {
      s.cancel();
    }
    _controller.dispose();
    super.dispose();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: _error != null
          ? _ErrorView(message: _error!, onRetry: () {
              setState(() => _error = null);
              _init();
            })
          : Stack(
              children: [
                if (_ready) Positioned.fill(child: Webview(_controller)),
                if (!_ready || _loading)
                  const Positioned(top: 0, left: 0, right: 0, child: LinearProgressIndicator(minHeight: 3)),
              ],
            ),
    );
  }
}

class _ErrorView extends StatelessWidget {
  const _ErrorView({required this.message, required this.onRetry});

  final String message;
  final VoidCallback onRetry;

  @override
  Widget build(BuildContext context) {
    return Center(
      child: ConstrainedBox(
        constraints: const BoxConstraints(maxWidth: 520),
        child: Padding(
          padding: const EdgeInsets.all(24),
          child: Column(
            mainAxisSize: MainAxisSize.min,
            children: [
              const Icon(Icons.error_outline, size: 56, color: kOrange),
              const SizedBox(height: 16),
              Text(message, textAlign: TextAlign.center),
              const SizedBox(height: 20),
              FilledButton.icon(
                onPressed: onRetry,
                icon: const Icon(Icons.refresh),
                label: const Text('Réessayer'),
              ),
            ],
          ),
        ),
      ),
    );
  }
}
