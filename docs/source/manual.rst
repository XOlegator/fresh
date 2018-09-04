.. index::
   single: Manual

Manual
======

There is /docs/source directory with user manual source files. Those files are compile to endpoint user manual by the help shell command (from the root directory of the project at stand alone terminal):

.. code-block:: bash

        $ sh docs/run-build.sh

The compiled docs you can open in browser fresh/docs/build/html/index.html

You can also find the project documentation on the site https://frendly-shop.readthedocs.io/en/latest/ This documentation is generated automatically: using the `github`_ hook and integrating with the `Read the Docs`_ project.

Documentation translation workflow
----------------------------------

These instructions are taken from the website http://www.sphinx-doc.org/en/master/intl.html.

`sphinx-intl`_ is a useful tool to work with Sphinx translation flow.
This section describe an easy way to translate with sphinx-intl.

#. Install `sphinx-intl`_ by :command:`pip install sphinx-intl` or
   :command:`easy_install sphinx-intl`.

#. Add configurations to your `conf.py`::

      locale_dirs = ['locale/']   # path is example but recommended.
      gettext_compact = False     # optional.

   This case-study assumes that `locale_dirs` is set to 'locale/' and
   `gettext_compact` is set to `False` (the Sphinx document is
   already configured as such).

#. Extract document's translatable messages into pot files:

   .. code-block:: console

      $ make gettext

   As a result, many pot files are generated under ``build/locale``
   directory.

#. Setup/Update your `locale_dir`:

   .. code-block:: console

      $ sphinx-intl update -p build/gettext -l de -l ja

   Done. You got these directories that contain po files:

   * `./locale/de/LC_MESSAGES/`
   * `./locale/ja/LC_MESSAGES/`

#. Translate your po files under `./locale/<lang>/LC_MESSAGES/`.

#. Make translated document.

   You need a `language` parameter in ``conf.py`` or you may also
   specify the parameter on the command line (for BSD/GNU make):

   .. code-block:: console

      $ make -e SPHINXOPTS="-D language='de'" html

   command line (for Windows cmd.exe):

   .. code-block:: console

      > set SPHINXOPTS=-D language=de
      > .\make.bat html

   command line (for PowerShell):

   .. code-block:: console

      > Set-Item env:SPHINXOPTS "-D language=de"
      > .\make.bat html


Congratulations! You got the translated documentation in the ``build/html``
directory.


.. _`github`: https://github.com/
.. _`Read the Docs`: https://readthedocs.org/
.. _`sphinx-intl`: https://pypi.org/project/sphinx-intl/